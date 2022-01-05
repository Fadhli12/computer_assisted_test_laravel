<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAccessRoomRequest;
use App\Http\Requests\UpdateAccessRoomRequest;
use App\Models\AccessRoom;
use App\Models\Room;
use Illuminate\Support\Facades\DB;

class AccessRoomController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            [
                'label' => 'Superior Sulbar',
                'url' => route('admin.dashboard'),
            ],
            [
                'label' => 'Access Room',
            ]
        ];
        $access_rooms = AccessRoom::with('room.questionGroups')->get();
        return view('admin.pages.access_room.index', compact('access_rooms', 'breadcrumbs'));
    }

    public function add()
    {
        $breadcrumbs = [
            [
                'label' => 'Superior Sulbar',
                'url' => route('admin.dashboard'),
            ],
            [
                'label' => 'Access Room',
                'url' => route('admin.access-room'),
            ],
            [
                'label' => 'Add',
            ]
        ];
        $access_room = new AccessRoom();
        $rooms = Room::where('is_active', true)->get();
        $type_access_room = AccessRoom::typeAccessRoomForOption();
        return view('admin.pages.access_room.add', compact('rooms', 'access_room', 'breadcrumbs', 'type_access_room'));
    }

    public function create(StoreAccessRoomRequest $request)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            AccessRoom::create($data);
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return redirect()->route('admin.access-room')->with('success', 'Success Add Access Room');
    }

    public function edit(AccessRoom $access_room)
    {
        $breadcrumbs = [
            [
                'label' => 'Superior Sulbar',
                'url' => route('admin.dashboard'),
            ],
            [
                'label' => 'Access Room',
                'url' => route('admin.access-room'),
            ],
            [
                'label' => 'Edit',
            ]
        ];
        $rooms = Room::where('is_active', true)->get();
        $type_access_room = AccessRoom::typeAccessRoomForOption();
        return view('admin.pages.access_room.add', compact('access_room', 'rooms', 'type_access_room', 'breadcrumbs'));
    }

    public function update(UpdateAccessRoomRequest $request, AccessRoom $access_room)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            $access_room->update($data);
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return redirect()->route('admin.access-room')->with('success', 'Success Update Access Room');
    }

    public function delete(AccessRoom $access_room)
    {
        $access_room->delete();
        return redirect()->route('admin.access-room')->with('success', 'Success Delete Access Room');
    }
}
