<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassData;
use App\Models\Section;
use App\Models\Student;
use App\Models\User;
use App\Models\Course;
use App\Models\Content;
class TeacherDashboardController extends Controller
{
    public function index()
    {
        
        $totalStudents = User::where('type', 'Student')->where('approve_status', 'Approved')->count();

        
        

  
        $totalClasses = ClassData::count();

       
        $totalCourses = Course::count();
        $totalContent = Content::count();

        return view('teacher.page.dashboard', compact('totalStudents', 'totalClasses', 'totalContent','totalCourses'));
    }
}
