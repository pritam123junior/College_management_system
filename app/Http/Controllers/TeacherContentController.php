<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\ClassData;
use App\Models\Group;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;


class TeacherContentController extends Controller
{
  
    public function index($course_id,Request $request)
    {
                if($request->type=='file'){
                    $contents = Content::where('course_id',$course_id)->where('type','file')->get();
                    $selected_type='file';
                }
                elseif($request->type=='youtube'){
                    $contents = Content::where('course_id',$course_id)->where('type','youtube')->get();
                    $selected_type='youtube';
                }
                else{
                    $contents = Content::where('course_id',$course_id)->where('type','youtube')->get();
                    $selected_type='';
                }
                
        

        return view('teacher.page.content.index', compact('contents','course_id','selected_type'));
    }

    public function create($course_id)
    {
        
        $groups=Group::where('course_id',$course_id)->get();

        return view('teacher.page.content.create', compact('course_id','groups'));
    }

    public function store($course_id,Request $request)
    {

        
        $request->validate([
            'name' => ['required','string','max:255'],
            'description' => ['nullable','string']               
        ]);    
        
        if($request->file_content){

            $request->validate([                         
                'file_content' => ['required','max:51200']                         
            ]); 
        
        $folder = 'contents'.'/'.Str::lower(Auth::user()->type);

        $latest_id=Content::latest()->value('id');

        $file_name=time().'.'.$request->file('file_content')->extension();

        $path = $folder.'/'.$file_name;

        $path=Storage::disk('local')->put($folder, $request->file_content);

        $file_type = $request->file('file_content')->extension();

        $type='file';

        $key = '';

        $url="/teacher/course/content/$course_id?type=file";
       
        }else{

            $request->validate([                
                'youtube_link' => ['required','string'],  
                'group_id' => ['required'],          
            ]); 

            $path='';
            $file_type='';
            $type='youtube';

            $url = parse_url($request->youtube_link, PHP_URL_QUERY);
            parse_str($url, $params);
            $key = $params['v'];

            $url="/teacher/course/content/$course_id?type=youtube";
        }

        $class_id=Course::where('id',$course_id)->value('class_id');
        
            Content::create([
                'name'=>$request->name,
                'description'=>$request->description,                
                'course_id' => $course_id,
                'class_id' => $class_id,
                'user_id' => Auth::id(),  
                'user_type' => Auth::user()->type,              
                'path' => $path,
                'file_type' => $file_type,
                'key'=>$key,
                'group_id'=>$request->group_id,
                'type'=>$type
               
            ]);

         

            return redirect($url)->with('success', 'Content added successfully.');
    }

    public function download($id)
    {
        $path=Content::where('id',$id)->value('path');

        return Storage::download($path);

        
    }


    public function destroy($id)
    {
        
        $content=Content::where('id',$id)->first();
        $course_id=$content->course_id;
        if($content->type=='file'){
            $url="/teacher/course/content/$course_id?type=file";
        }else{
            $url="/teacher/course/content/$course_id?type=youtube";
        }

        Content::destroy($id);

        

        return redirect($url)->with('success', 'Content deleted successfully!');
    }
    public function groupList($id)
    {
        $groups = Group::with('course')->where('course_id',$id)->get();
        return view('teacher.page.group.index', compact('groups','id'));
    }

    // Show form to create a new group
    public function groupCreate($id)
    {
        return view('teacher.page.group.create',compact('id'));
    }

    // Store a newly created group
    public function groupStore($id,Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $class_id=Course::where('id',$id)->value('class_id');

        Group::create([
            'name'=>$request->name,            
            'course_id' => $id,  
            'class_id' => $class_id         
        ]);

        return redirect()->route('teacher.course.group.list',$id)
                         ->with('success', 'Group created successfully.');
    }

    // Show details of a specific group
  

    // Show form to edit an existing group
    public function groupEdit($id)
    { 

        $group = Group::find($id);

        return view('teacher.page.group.edit', compact('group'));
    }

    // Update an existing group
    public function groupUpdate($id,Request $request)
    {
        $request->validate([
            'name' => ['required' ],
        ]);

        $group = Group::find($id);

        $course_id=Group::where('id',$group->id)->value('course_id');

        $group->update([
            'name'=>$request->name         
        ]);       
        

        return redirect()->route('teacher.course.group.list',$course_id)->with('success', 'Group updated successfully.');
    }

    // Delete a group
    public function groupDestroy($id)
    {
        $group = Group::find($id);

        $course_id=Group::where('id',$group->id)->value('course_id');

        $group->delete();

        

        return redirect()->route('teacher.course.group.list',$course_id)
                         ->with('success', 'Group deleted successfully.');
    }

}
