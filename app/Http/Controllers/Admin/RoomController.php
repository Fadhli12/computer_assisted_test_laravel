<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Models\QuestionGroup;
use App\Models\Room;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            [
                'label' => 'Superior Sulbar',
                'url' => route('admin.dashboard'),
            ],
            [
                'label' => 'Room',
            ]
        ];
        $rooms = Room::with('questionGroups')->get();
        return view('admin.pages.room.index', compact('rooms', 'breadcrumbs'));
    }

    public function add()
    {
        $breadcrumbs = [
            [
                'label' => 'Superior Sulbar',
                'url' => route('admin.dashboard'),
            ],
            [
                'label' => 'Room',
                'url' => route('admin.room'),
            ],
            [
                'label' => 'Add',
            ]
        ];
        $room = new Room();
        $question_group = QuestionGroup::get()->filter(function ($filter) {
            return $filter->total_question === $filter->total_question_filled;
        });
        return view('admin.pages.room.add', compact('room', 'question_group', 'breadcrumbs'));
    }

    public function create(StoreRoomRequest $request)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            $room = Room::create($data);
            $room->questionGroups()->attach($data['question_group']);
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return redirect()->route('admin.room')->with('success', 'Success Add Room');
    }

    public function edit(Room $room)
    {
        $breadcrumbs = [
            [
                'label' => 'Superior Sulbar',
                'url' => route('admin.dashboard'),
            ],
            [
                'label' => 'Room',
                'url' => route('admin.room'),
            ],
            [
                'label' => 'Edit',
            ]
        ];
        $question_group = QuestionGroup::get()->filter(function ($filter) {
            return $filter->total_question === $filter->total_question_filled;
        });
        return view('admin.pages.room.add', compact('question_group', 'room', 'breadcrumbs'));
    }

    public function update(UpdateRoomRequest $request, Room $room)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            $room->update($data);
            $room->questionGroups()->sync($data['question_group']);
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return redirect()->route('admin.room')->with('success', 'Success Update Room');
    }

    public function delete(Room $room)
    {
        $room->questionGroups()->detach();
        $room->delete();
        return redirect()->route('admin.room')->with('success', 'Success Delete Room');
    }


}
