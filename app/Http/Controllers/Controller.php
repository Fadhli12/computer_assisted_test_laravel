<?php

namespace App\Http\Controllers;

use App\Models\AccessRoom;
use App\Models\Participant;
use App\Models\QuestionGroup;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        if (session()->has('access_room_id')) {
            return redirect()->route('register');
        }
        return view('home');
    }

    public function submitKey(Request $request)
    {
        $data = $request->validate([
            'key' => 'required'
        ]);
        if (!$access_room = AccessRoom::where('key', $data['key'])->where('is_active',true)->first()){
            return redirect()->route('home');
        }
        session(['access_room_id' => $access_room->id]);
        return redirect()->route('register');
    }

    public function register()
    {
        if (session()->has('access_room_id')) {
            if (session()->has('token_id')){
                return redirect()->route('about-quiz');
            }
            return view('register');
        }
        return redirect()->route('home');
    }

    public function submitRegister(Request $request)
    {
        if (session()->has('access_room_id')) {
            $data = $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'email' => 'nullable|email'
            ]);
            $access_room = AccessRoom::with('room')->findOrFail(session('access_room_id'));
            $token_id = bcrypt($access_room->key);
            Participant::create([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'email' => $data['email'] ?? null,
                'access_room_id' => $access_room->id,
                'room_id' => $access_room->room_id,
                'time_start' => now(),
                'time_end' => null,
                'time_limit' => now()->addMinutes($access_room->room->total_duration),
                'token_id' => $token_id
            ]);
            session(['token_id' => $token_id]);
            return redirect()->route('about-quiz');
        }
        return redirect()->route('home');
    }

    public function aboutQuiz()
    {
        if (session()->has('progress')){
            return redirect()->route('quiz');
        }
        $access_room = AccessRoom::with('room.questionGroups')->findOrFail(session('access_room_id'));
        $participant = Participant::where('token_id',session('token_id'))->first();
        if ($access_room && $participant){
            return view('about-quiz',compact('participant','access_room'));
        }
        session()->forget([
            'access_room_id','token_id'
        ]);
        return redirect()->route('home');
    }

    public function startQuiz(){
        $access_room = AccessRoom::with('room.questionGroups')->findOrFail(session('access_room_id'));
        $participant = Participant::where('token_id',session('token_id'))->first();
        if ($access_room && $participant){
            $room = [];
            $total_time = 0;
            foreach ($access_room->room->questionGroups AS $index => $group){
                $room[$group->id] = [
                    'start_time' => $index === 0 ? now() : null,
                    'limit_time' => now()->addMinutes($group->duration_per_section * $group->section_ammount),
                    'status' => $index === 0 ? 'start' : 'waiting'
                ];
                $total_time += $group->duration_per_section * $group->section_ammount;
            }
            $progress = [
                'status' => 'start',
                'start_time' => now(),
                'limit_time' => now()->addMinutes($total_time+count($room)),
                'room' => $room
            ];
            $progress = json_encode($progress);
            DB::table('participant_progress_temp')->insert([
                'token_id' => session('token_id'),
                'progress' => $progress,
                'created_at' => now(),
            ]);
            return redirect()->route('quiz');
        }
        session()->forget([
            'access_room_id','token_id'
        ]);
        return redirect()->route('home');
    }

    public function quiz()
    {
        $token_id = session('token_id');
        if (!$token_id){
            return redirect()->route('home');
        }
        $data = DB::table('participant_progress_temp')->where('token_id',$token_id)->first();
        $question_group = null;
        if ($data){
            $progress = json_decode($data->progress);
            if ($progress->status == 'start') {
                foreach ($progress->room as $room_id => $value) {
                    if ($value->status == 'start') {
                        $question_group = QuestionGroup::with('sections.questions.answers')->find($room_id);
                        session(['current_room_id' => $room_id]);
                    }
                }
            }
        }
        if ($question_group){
            $duration = $question_group->duration_per_section;
            $data_quiz = $question_group->sections->map(function ($value,$index)use($duration,$question_group){
                return [
                    'section' => $index,
                    'status' => $index == 0 ? 'start' : 'waiting',
                    'start' => $index == 0 ? now() : now()->addMinutes(($index ?? 1) * $duration),
                    'end' => $index == 0 ? now()->addMinutes($duration) : now()->addMinutes((($index ?? 1)+1) * $duration),
                    'questions' => $value->questions->map(function ($value,$index) use ($question_group){
                        $answer = $value->answers()->where('value','>',0)->get();
                        if ($question_group->type === QuestionGroup::TYPE_KEPRIBADIAN){
                            return [
                                'index' => $index,
                                'question' => $value->question,
                                'answers' => $value->answers->map(function ($value, $index) {
                                    return [
                                        'index' => $index,
                                        'answer' => $value->answer,
                                        'choice' => $value->choice,
                                        'value' => $value->value
                                    ];
                                }),
                                'correct_choice' => $answer->pluck('choice'),
                                'correct_answer' => $answer->map(function ($value) {
                                    return $value->answer;
                                }),
                                'user_answer' => null
                            ];
                        } else {
                            if ($answer->count() == 1) {
                                $answer = $answer[0];
                                return [
                                    'index' => $index,
                                    'question' => $value->question,
                                    'answers' => $value->answers->map(function ($value, $index) {
                                        return [
                                            'index' => $index,
                                            'answer' => $value->answer,
                                            'choice' => $value->choice
                                        ];
                                    }),
                                    'correct_choice' => $answer->choice,
                                    'correct_answer' => $answer->answer,
                                    'user_answer' => null
                                ];
                            } else {
                                return [
                                    'index' => $index,
                                    'question' => $value->question,
                                    'answers' => $value->answers->map(function ($value, $index) {
                                        return [
                                            'index' => $index,
                                            'answer' => $value->answer,
                                            'choice' => $value->choice
                                        ];
                                    }),
                                    'correct_choice' => $answer->pluck('choice'),
                                    'correct_answer' => $answer->map(function ($value) {
                                        return $value->answer;
                                    }),
                                    'user_answer' => []
                                ];
                            }
                        }
                    }),
                ];
            });
            return view($question_group->type, compact('question_group','data_quiz'));
        }
        $progress->status = 'end';
        DB::table('participant_progress_temp')->where('token_id',$token_id)->update([
            'progress' =>  json_encode($progress)
        ]);
        dd($progress);
    }

    public function saveProgress(Request $request){
        $input = $request->validate([
            'data' => 'required'
        ]);
        if ($token_id = session('token_id')){
            if ($data = DB::table('participant_progress_temp')->where('token_id',$token_id)->first()){
                $room_id = session('current_room_id');
                $progress = json_decode($data->progress);
                $progress->room->{$room_id}->progress = $input['data'];
                $progress->room->{$room_id}->status = 'end';
                DB::table('participant_progress_temp')->where('token_id',$token_id)->update([
                    'progress' => json_encode($progress)
                ]);
                return response()->json([
                    "message" => 'success save progress'
                ]);
            }
        }
        session()->forget([
            'access_room_id','token_id'
        ]);
        return response()->json()->setStatusCode(Response::HTTP_FORBIDDEN);
    }

    public function login()
    {
        return view('login');
    }

    public function doLogin(Request $request)
    {
        $input = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember_me' => 'boolean|nullable'
        ]);
        if (auth()->attempt($request->only(['email','password']), $input['remember_me'] ?? false)) {
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->back()->with('message', 'Email/Password Salah!');
    }

    public function doLogout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
