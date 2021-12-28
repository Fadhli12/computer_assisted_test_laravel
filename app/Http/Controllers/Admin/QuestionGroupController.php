<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestionGroupRequest;
use App\Http\Requests\UpdateQuestionGroupRequest;
use App\Models\QuestionGroup;
use App\Models\Question;
use App\Models\TaskSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class QuestionGroupController extends Controller
{
    public function index(){
        $data = QuestionGroup::get();
        return view('admin.pages.question_group.index',compact('data'));
    }

    public function add(){
        $question_group = new QuestionGroup();
        $types = QuestionGroup::typeQuestionGroupForOption();
        return view('admin.pages.question_group.add',compact('types','question_group'));
    }

    public function create(StoreQuestionGroupRequest $request){
        $data = $request->validated();
        try {
            DB::beginTransaction();
            $question_groups = QuestionGroup::create($data);
            for ($section = 1; $section <= $data['section_ammount']; $section++){
                $question_groups->sections()->create([
                    'section' => $section
                ]);
            }
        } catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        $message = 'Add Question Group Success';
        return redirect()->route('admin.question-group')->with('success',$message);
    }

    public function edit(QuestionGroup $question_group){
        $types = QuestionGroup::typeQuestionGroupForOption();
        return view('admin.pages.question_group.add',compact('types','question_group'));
    }

    public function update(UpdateQuestionGroupRequest $request, QuestionGroup $question_group){
        $data = $request->validated();
        try {
            DB::beginTransaction();
            if ($data['section_ammount'] !== $question_group->section_ammount) {
                if ($data['section_ammount'] > $question_group->section_ammount) {
                    for ($section = $question_group->section_ammount + 1; $section <= $data['section_ammount']; $section++) {
                        $question_group->sections()->create([
                            'section' => $section
                        ]);
                    }
                } else {
                    $question_group->sections()->where('section', '>', $data['section_ammount'])->delete();
                }
            }
            $question_group->update($data);
        } catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        $message = 'Update Question Group Success';
        return redirect()->route('admin.question-group')->with('success',$message);
    }

    public function delete(QuestionGroup $question_group){
        $question_group->delete();
        $message = 'Delete Question Group Success';
        return redirect()->route('admin.question-group')->with('success',$message);
    }

    public function section(QuestionGroup $question_group){
        $question_group->load('sections');
        return view('admin.pages.question_group.section.index',compact('question_group'));
    }

    public function questions(QuestionGroup $question_group, TaskSection $section){
        $section->load(['questions.answers']);
        return view('admin.pages.question_group.section.questions.index',compact('section','question_group'));
    }

    public function createQuestions(Request $request, QuestionGroup $question_group, TaskSection $section){
        $data = $request->validate([
            'question' => 'required',
            'answer' => 'required|array',
            'value' => 'required'
        ]);
        try {
            DB::beginTransaction();
            $question = $section->questions()->create([
                'question' => $data['question'],
                'question_group_id' => $section->question_group_id,
            ]);
            $choice = "a";
            foreach ($data['answer'] as $answer) {
                $question->answers()->create([
                    'choice' => $choice++,
                    'answer' => $answer,
                    'value' => 0,
                    'question_id' => $question->id
                ]);
            }
            if ($question_group->type === QuestionGroup::TYPE_NORMAL){
                $question->answers()->where('choice', $data['value'])->update([
                    'value' => 1
                ]);
            } else if ($question_group->type === QuestionGroup::TYPE_MULTI_JAWABAN){
                $question->answers()->whereIn('choice', $data['value'])->update([
                    'value' => 1
                ]);
            } else if ($question_group->type === QuestionGroup::TYPE_KEPRIBADIAN){
                foreach ($data['value'] AS $key => $value){
                    $question->answers()->where('choice', $key)->update([
                        'value' => $value
                    ]);
                }
            }
        } catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return redirect()->back()->with('success','Success Add Quesiton');
    }

    public function updateQuestions(Request $request, QuestionGroup $question_group, TaskSection $section, Question $question){
        $data = $request->validate([
            'question' => 'required',
            'answer' => 'required|array',
            'value' => 'required'
        ]);
        try {
            DB::beginTransaction();
            $question->update([
                'question' => $data['question'],
                'question_group_id' => $section->question_group_id,
            ]);
            $question->load('answers');
            foreach ($data['answer'] as $key => $answer) {
                $question->answers()
                    ->where('id',$key)
                    ->update([
                    'answer' => $answer,
                    'value' => 0,
                    'question_id' => $question->id
                ]);
            }
            if ($question_group->type === QuestionGroup::TYPE_NORMAL){
                $question->answers()->where('choice',$data['value'])->update([
                    'value' => 1
                ]);
            } else if ($question_group->type === QuestionGroup::TYPE_MULTI_JAWABAN){
                $question->answers()->whereIn('choice', $data['value'])->update([
                    'value' => 1
                ]);
            } else if ($question_group->type === QuestionGroup::TYPE_KEPRIBADIAN){
                foreach ($data['value'] AS $key => $value){
                    $question->answers()->where('choice', $key)->update([
                        'value' => $value
                    ]);
                }
            }
        } catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return redirect()->back()->with('success','Success update Question');
    }

    public function deleteQuestions($question_group, $section, $question){
        $data = Question::where('question_group_id',$question_group)
            ->where('task_section_id',$section)
            ->find($question);
        if (!$data){
            throw new NotFoundHttpException("Question Not Found");
        }
        $data->delete();
        return redirect()->back()->with('success','Success Delete Question');
    }
}
