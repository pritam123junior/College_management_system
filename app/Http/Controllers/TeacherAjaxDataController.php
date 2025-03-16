<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Course;
class TeacherAjaxDataController extends Controller
{
    public function section(Request $request){  

        $sections=Section::where('class_id',$request->class_id)->get();
        
        return response()->json($sections);

    }
    public function course(Request $request){  

        $courses=Course::where('class_id',$request->class_id)->get();
        
        return response()->json($courses);

    }
}
