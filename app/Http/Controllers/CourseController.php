<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
use Auth;

class CourseController extends Controller
{
    public function index()
    {
       
        $courses = Course::where('class_id',  Auth::user()->student?->class_id)->get();
        
        return view('student.page.course.index', compact('courses'));

    }

}
