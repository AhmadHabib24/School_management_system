<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function teacher_profile()
    {
        return view('admin.teacher-profile');
    }
}
