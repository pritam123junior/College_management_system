<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\ClassData;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class AdminContentController extends Controller
{
    public function index()
    {
        $contents = Content::get(); 
        return view('admin.page.content.index', compact('contents'));
    }

    public function create()
    {
        $classes = ClassData::get(); 

        return view('admin.page.content.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'description' => ['required','string'],
            'class_id'=>['required'],
            'course_id' => ['nullable'],
            'file_content' => ['required','file','size:51200']            
        ]);       
        $folder= 'contents'.'/'.Auth::user()->type.'/'.Auth::id();

        $upload_status=Storage::disk('local')->put($folder, $request->file_content);
        if($upload_status){

            Content::create([
                'name'=>$request->name,
                'class_id' => $request->class_id,
                'course_id' => $request->course_id,
                'price' => $request->price,
                'duration' => $request->duration,
                'type' => $request->type,
               
            ]);

        }



       

        return redirect()->route('admin.course.index')->with('success', 'Course created and pending approval.');
    }

}
