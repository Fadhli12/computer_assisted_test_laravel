<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            [
                'label' => 'Superior Sulbar',
                'url' => route('admin.dashboard'),
            ],
            [
                'label' => 'User Admin',
            ]
        ];
        $users = User::where('id', '!=', auth()->user()->id)->paginate(10);
        return view('admin.pages.user.index', compact('users', 'breadcrumbs'));
    }

    public function add()
    {
        $breadcrumbs = [
            [
                'label' => 'Superior Sulbar',
                'url' => route('admin.dashboard'),
            ],
            [
                'label' => 'User Admin',
                'url' => route('admin.user'),
            ],
            [
                'label' => 'Add',
            ]
        ];
        $user = new User();
        return view('admin.pages.user.add', compact('user', 'breadcrumbs'));
    }

    public function create(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['email_verified_at'] = now();
        try {
            DB::beginTransaction();
            User::create($data);
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return redirect()->route('admin.user')->with('success', 'Success Add User');
    }

    public function edit(User $user)
    {
        $breadcrumbs = [
            [
                'label' => 'Superior Sulbar',
                'url' => route('admin.dashboard'),
            ],
            [
                'label' => 'User Admin',
                'url' => route('admin.user'),
            ],
            [
                'label' => 'Edit',
            ]
        ];
        return view('admin.pages.user.add', compact('user', 'breadcrumbs'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            $user->update($data);
        } catch (\Exception $exception) {
            DB::rollBack();
            throw $exception;
        }
        DB::commit();
        return redirect()->route('admin.user')->with('success', 'Success Update User');
    }

    public function delete(User $user)
    {
        $user->delete();
        return redirect()->route('admin.user')->with('success', 'Success Delete User');
    }
}
