<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Group;
use App\Models\Content;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
       
        $courses = Course::where('class_id',  Auth::user()->student?->class_id)->get();
        
        return view('student.page.course.index', compact('courses'));

      
    }
    public function view($id)
    {
        
        $groups = DB::table('groups')
    ->join('contents', 'groups.id', '=', 'contents.group_id')
    ->select('groups.*', 'contents.*')
    ->where('contents.class_id',Auth::user()->student?->class_id)
    ->get();

        return view('student.page.content.index', compact( 'groups'));
    }
}
