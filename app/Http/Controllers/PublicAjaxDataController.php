<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;

class PublicAjaxDataController extends Controller
{
    public function publicSection(Request $request){  

        $sections=Section::select('id','name')->where('class_id',$request->class_id)->get();
        
        return response()->json($sections);

    }
}
