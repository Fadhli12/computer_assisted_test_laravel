<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $breadcrumbs = [
            [
                'label' => 'Superior Sulbar',
                'url' => route('admin.dashboard'),
            ],
            [
                'label' => 'Dashboard',
            ]
        ];
        return view('admin.pages.dashboard',compact('breadcrumbs'));
    }
}
