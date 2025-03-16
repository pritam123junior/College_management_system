<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Group;
use App\Models\Content;
use Illuminate\Http\Request;
use Auth;


class CourseController extends Controller
{
    public function index()
    {
       
        $courses = Course::where('class_id',  Auth::user()->student?->class_id)->get();
        
        return view('student.page.course.index', compact('courses'));

      
    }
    public function view($id)
    {
        
    $groups=Group::with('contents')->get();
  

        return view('student.page.content.index', compact( 'groups'));
    }
}
