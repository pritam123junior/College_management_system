<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\ClassData;
use App\Models\Group;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;

class ContentController extends Controller
{
    public function index($course_id, Request $request)
    {

        

        if ($request->type == 'file') {
            $contents = Content::where('course_id', $course_id)->where('type', 'file')->where('class_id',Auth::user()->student?->class_id)->get();
            $selected_type = 'file';
            return view('student.page.content.file.index', compact('contents', 'course_id', 'selected_type'));

        } elseif ($request->type == 'youtube') {
            
            $groups=Group::with('contents')->where('class_id',Auth::user()->student?->class_id)->get();
            $selected_type = 'youtube';   
           
            return view('student.page.content.youtube.index', compact( 'groups','selected_type'));

            
        } else {
            $groups=Group::with('contents')->where('class_id',Auth::user()->student?->class_id)->get();
            $selected_type = 'youtube';   
           
            return view('student.page.content.youtube.index', compact( 'groups','selected_type'));
        }

        

        

    }


    public function download($id)
    {
         $path=Content::where('id',$id)->value('path');

        return Storage::download($path);

        
    }


}
