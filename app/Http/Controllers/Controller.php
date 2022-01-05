<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function quiz(){
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
        return view('quiz',compact('room'));
    }

    public function login(){
        return view('login');
    }

    public function doLogin(Request $request){
        $input = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember_me' => 'boolean|nullable'
        ]);
        if (auth()->attempt(['email' => $input['email'] ,'password' => $input['password']], $input['remember_me'] ?? false)){
            return redirect()->intended(route('admin.dashboard'));
        }
        return redirect()->back()->with('message','Email/Password Salah!');
    }

    public function doLogout(){
        auth()->logout();
        return redirect()->route('login');
    }
}
