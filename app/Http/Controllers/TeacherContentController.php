<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\ClassData;
use App\Models\Group;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class TeacherContentController extends Controller
{
  
    public function index()
    {
        $contents = Content::get(); 
        return view('teacher.page.content.index', compact('contents'));
    }

    public function create()
    {
        $classes = ClassData::get(); 
        $youtube_groups=Group::get();

        return view('teacher.page.content.create', compact('classes','youtube_groups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'description' => ['nullable','string'],
            'class_id'=>['required'],
            'course_id' => ['nullable'],
            'file_content' => ['nullable','max:51200'],
            'youtube_link' => ['nullable','string'],  
            'group_id' => ['nullable'],          
        ]);    
        
        if($request->file_content){
        
        $folder = 'contents'.'/'.Str::lower(Auth::user()->type);

        $latest_id=Content::latest()->value('id');

        $file_name=time().'.'.$request->file('file_content')->extension();

        $path = $folder.'/'.$file_name;

        $path=Storage::disk('local')->put($folder, $request->file_content);

        $file_type = $request->file('file_content')->extension();

        $type='file';
       
        }else{
            $path='';
            $file_type='';
            $type='youtube_link';
        }


            Content::create([
                'name'=>$request->name,
                'description'=>$request->description,
                'class_id' => $request->class_id,
                'course_id' => $request->course_id,
                'user_id' => Auth::id(),  
                'user_type' => Auth::user()->type,              
                'path' => $path,
                'file_type' => $file_type,
                'youtube_link'=>$request->youtube_link,
                'group_id'=>$request->group_id,
                'type'=>$type
               
            ]);

         
        
        




        return redirect()->route('teacher.content.index')->with('success', 'Content added successfully.');
    }

    public function download($id)
    {
       return $id; $path=Content::where('id',$id)->value('path');

        return Storage::download($path);
        
    }


    public function destroy($id)
    {
        Content::destroy($id);

        return redirect()->route('teacher.content.index')->with('success', 'Content deleted successfully!');
    }
    public function groupList()
    {
        $groups = Group::all();
        return view('teacher.page.group.index', compact('groups'));
    }

    // Show form to create a new group
    public function groupCreate()
    {
        return view('teacher.page.group.create');
    }

    // Store a newly created group
    public function groupStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Group::create($request->all());

        return redirect()->route('teacher.group.list')
                         ->with('success', 'Group created successfully.');
    }

    // Show details of a specific group
  

    // Show form to edit an existing group
    public function groupEdit($id)
    { 
        $group = Group::findOrFail($id);
        return view('teacher.page.group.edit', compact('group'));
    }

    // Update an existing group
    public function groupUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => ['required' ],
        ]);

        $group = Group::findOrFail($id);
        $group->update($request->all());

        return redirect()->route('teacher.group.list')->with('success', 'Group updated successfully.');
    }

    // Delete a group
    public function groupDestroy($id)
    {
        $group = Group::findOrFail($id);
        $group->delete();

        return redirect()->route('teacher.group.list')
                         ->with('success', 'Group deleted successfully.');
    }

}
