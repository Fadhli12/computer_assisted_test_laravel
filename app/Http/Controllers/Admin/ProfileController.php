<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function index(){
        $breadcrumbs = [
            [
                'label' => 'Superior Sulbar',
                'url' => route('admin.dashboard'),
            ],
            [
                'label' => 'Profile',
            ]
        ];
        $user = auth()->user();
        return view('admin.pages.profile',compact('breadcrumbs','user'));
    }

    public function updateProfile(UpdateProfileRequest $request){
        $input = $request->validated();
        if (isset($input['password'])){
            $input['password'] = bcrypt($input['password']);
        } else {
            unset($input['password']);
        }
        $user = auth()->user();
        $user->update($input);
        return redirect()->back()->with('success','Update Profile Success');
    }
}
