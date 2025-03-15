<?php

namespace App\Http\Controllers;
use App\Models\ClassData;
use Illuminate\Http\Request;

class TeacherClassController extends Controller
{
    public function index(){
        $classes = ClassData::all();
        return view('teacher.page.class.index', compact('classes'));
}
}