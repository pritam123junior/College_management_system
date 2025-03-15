<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\ClassData;
class TeacherCourseController extends Controller
{
    public function index()
    {
         $courses = Course::all();
        return view('teacher.page.course.index', compact('courses'));
    }
    public function view($id)
    {
        $course = Course::all();
    $contents = content::where('course_id',$id)->get();

        return view('teacher.page.content.index', compact( 'contents','course'));
    }

}
