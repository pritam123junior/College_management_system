<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
       

        
        

  
     
       
        $totalCourses = Course::count();

        return view('student.page.dashboard', compact(  'totalCourses'));
    }
}
