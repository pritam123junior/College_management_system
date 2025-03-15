<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\ClassData;
use App\Models\YoutubeGroup;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TeacherContentController extends Controller
{
  
    public function index()
    {
        $contents = Content::orderBy('id','desc')->get(); 
        return view('teacher.page.content.index', compact('contents'));
    }

    public function create()
    {
        $classes = ClassData::get(); 
        $youtube_groups=YoutubeGroup::get();

        return view('teacher.page.content.create', compact('classes','youtube_groups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'class_id'=>['required'],
            'course_id' => ['nullable'],
            'file_content' => ['required','max:51200']            
        ]);             
        
        $folder = 'contents'.'/'.Str::lower(Auth::user()->type);

        $latest_id=Content::latest()->value('id');

        $file_name=time().'.'.$request->file('file_content')->extension();

        $path = $folder.'/'.$file_name;

        $path=Storage::disk('local')->put($folder, $request->file_content);
        if($path){



            Content::create([
                'name'=>$request->name,
                'description'=>$request->description,
                'class_id' => $request->class_id,
                'course_id' => $request->course_id,
                'user_id' => Auth::id(),  
                'user_type' => Auth::user()->type,              
                'path' => $path,
                'file_type' => $request->file('file_content')->extension()
               
            ]);

        }               

        return redirect()->route('teacher.content.index')->with('success', 'Content added successfully.');
    }

    public function download($id)
    {
        $path=Content::where('id',$id)->value('path');

        return Storage::download($path);
        
    }


    public function destroy($id)
    {
        Content::destroy($id);

        return redirect()->route('teacher.content.index')->with('success', 'Content deleted successfully!');
    }
}
