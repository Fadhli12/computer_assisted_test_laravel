<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuestionGroup;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    public function index(){
        $rooms = Room::with('questionGroups')->get();
        return view('admin.pages.room.index',compact('rooms'));
    }

    public function add(){
        $room = new Room();
        $question_group = QuestionGroup::get()->filter(function ($filter){
            return $filter->total_question === $filter->total_question_filled;
        });
        return view('admin.pages.room.add',compact('room','question_group'));
    }

    public function create(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'is_active' => 'required|boolean',
            'question_group' => 'required|array'
        ]);
        try {
            DB::beginTransaction();
            $room = Room::create($data);
            $room->questionGroups()->attach($data['question_group']);
        } catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return redirect()->route('admin.room')->with('success','Success Add Room');
    }

    public function edit(Room $room){
        $question_group = QuestionGroup::get()->filter(function ($filter){
            return $filter->total_question === $filter->total_question_filled;
        });
        return view('admin.pages.room.add',compact('question_group','room'));
    }

    public function update(Request $request, Room $room){
        $data = $request->validate([
            'name' => 'required',
            'is_active' => 'required|boolean',
            'question_group' => 'required|array'
        ]);
        try {
            DB::beginTransaction();
            $room->update($data);
            $room->questionGroups()->sync($data['question_group']);
        } catch (\Exception $exception){
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return redirect()->route('admin.room')->with('success','Success Update Room');
    }

    public function delete(Room $room){
        $room->questionGroups()->detach();
        $room->delete();
        return redirect()->route('admin.room')->with('success','Success Delete Room');
    }


}
