<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassData;
use App\Models\Section;
use App\Models\Student;
use App\Models\User;
use App\Models\Course;
class AdminDashboardController extends Controller
{
   public function index()
    {
        
        $totalStudents = User::where('type', 'Student')->where('approve_status', 'Approved')->count();

        
        $totalTeachers = User::where('type', 'Teacher')->count();

  
        $totalClasses = ClassData::count();

       
        $totalCourses = Course::count();

        return view('admin.page.dashboard', compact('totalStudents', 'totalTeachers', 'totalClasses', 'totalCourses'));
    }
}
