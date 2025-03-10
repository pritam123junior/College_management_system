<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeacherContentController extends Controller
{
    public function index(){
        return view('teacher.page.content.index');
    }
    public function add(Request $request,$id){
        return view('teacher.page.content.add');
    }
}
