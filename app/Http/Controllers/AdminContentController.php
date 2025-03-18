<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\ClassData;
use App\Models\Group;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;



class AdminContentController extends Controller
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
                
        

        return view('admin.page.content.index', compact('contents','course_id','selected_type'));
    }

    public function create($course_id)
    {
        
        $groups=Group::where('course_id',$course_id)->get();

        return view('admin.page.content.create', compact('course_id','groups'));
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
        }

            
            Content::create([
                'name'=>$request->name,
                'description'=>$request->description,                
                'course_id' => $course_id,
                'user_id' => Auth::id(),  
                'user_type' => Auth::user()->type,              
                'path' => $path,
                'file_type' => $file_type,
                'key'=>$key,
                'group_id'=>$request->group_id,
                'type'=>$type
               
            ]);

         
    

        return redirect()->route('admin.course.content.index',$course_id)->with('success', 'Content added successfully.');
    }

    public function download($id)
    {
        $path=Content::where('id',$id)->value('path');

        return Storage::download($path);
        
    }


    public function destroy($id)
    {
        Content::destroy($id);

        return redirect()->route('admin.content.index')->with('success', 'Content deleted successfully!');
    }
    public function groupList($id)
    {
          $groups = Group::with('course')->get();
        return view('admin.page.group.index', compact('groups','id'));
    }

    // Show form to create a new group
    public function groupCreate($id)
    {
        return view('admin.page.group.create',compact('id'));
    }

    // Store a newly created group
    public function groupStore($id,Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Group::create([
            'name'=>$request->name,            
            'course_id' => $id          
        ]);

        return redirect()->route('admin.course.group.list',$id)
                         ->with('success', 'Group created successfully.');
    }

    // Show details of a specific group
  

    // Show form to edit an existing group
    public function groupEdit($id)
    { 

        $group = Group::find($id);

        return view('admin.page.group.edit', compact('group'));
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
        

        return redirect()->route('admin.course.group.list',$course_id)->with('success', 'Group updated successfully.');
    }

    // Delete a group
    public function groupDestroy($id)
    {
        $group = Group::find($id);

        $course_id=Group::where('id',$group->id)->value('course_id');

        $group->delete();

        

        return redirect()->route('admin.course.group.list',$course_id)
                         ->with('success', 'Group deleted successfully.');
    }

}
