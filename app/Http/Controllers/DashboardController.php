<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Teacher;
use App\Models\Content;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTeachers = Teacher::count();
        $totalCourses = Course::count();
        $totalContents = Content::count();

        return view('student.page.dashboard', compact(  'totalTeachers','totalCourses','totalContents'));
    }
}
