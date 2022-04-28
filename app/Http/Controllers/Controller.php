<?php

namespace App\Http\Controllers;

use App\Models\AccessRoom;
use App\Models\Participant;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

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
        $access_room = AccessRoom::where('key', $data['key'])->where('is_active',true)->first();
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
            session(['progress' => $progress]);
            DB::table('participant_progress_temp')->insert([
                'token_id' => session('token_id'),
                'progress' => $progress
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
        $room = [
            3 => [
                'start_time' => "2021-12-28 15:00",
                'end_time' => "2021-12-28 20:00",
                'status' => 'start'
            ],
            4 => [
                'start_time' => null,
                'end_time' => null,
                'status' => 'waiting'
            ]
        ];
//        foreach ($room AS $key => $value){
//            if ($value['start_time'] <= date("Y-m-d H:i:s") && $value['end_time'] )
//        }
        return view('quiz', compact('room'));
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
