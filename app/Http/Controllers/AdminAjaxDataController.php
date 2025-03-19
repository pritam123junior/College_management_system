<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Course;
use App\Models\Content;
use Illuminate\Support\Facades\Storage;

class AdminAjaxDataController extends Controller
{
    public function section(Request $request){  

        $sections=Section::where('class_id',$request->class_id)->get();
        
        return response()->json($sections);

    }
    public function course(Request $request){  

        $courses=Course::where('class_id',$request->class_id)->get();
        
        return response()->json($courses);

    }
    public function file(Request $request){  

        
        $path=Content::where('id',$request->id)->value('path');
       $file_data=Storage::get($path);
       $data=$mime = Storage::mimeType($path);
       $file_encoded_data=base64_encode($file_data);
       $data=$file_data;

      //  src="data:image/png;base64,{{base64_encode(\Illuminate\Support\Facades\Storage::disk('local')->get('contents/admin/t.png'))}}"
        
        return response()->json($data);

    }
}
