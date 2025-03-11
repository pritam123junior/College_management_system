<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;

class AdminAjaxDataController extends Controller
{
    public function section(Request $request){  

        $sections=Section::where('class_id',$request->class_id)->get();
        
        return response()->json($sections);

    }
}
