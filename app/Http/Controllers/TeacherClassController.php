<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherClassController extends Controller
{
    public function index(){
        return view('teacher.page.class');
    }
}
