<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\ClassData;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminCourseController extends Controller
{
    public function index()
    {
         $courses = Course::all();
        return view('admin.page.course.index', compact('courses'));
    }

    public function create()
    {   
          $classes=ClassData::all();
        return view('admin.page.course.create' , compact('classes'));
    }    
   
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'class_id'=>['nullable'],
            'section_name'=>['nullable'],
            'description' => ['nullable','string'],
            'price' => ['nullable','string'],            
            'type' => ['required'],
        ]);

        Course::create([
            'class_id'=>$request->class_id,
            'section_name'=>$request->section_name,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,            
            'type' => $request->type,
           
        ]);

        return redirect()->route('admin.course.index')->with('success', 'Course added successfully.');
    }

    public function edit($id)
    {
        $course = Course::find($id);
        $classes = classData::all();
        $sections = Section::where('class_id',$course->class_id)->get();
        return view('admin.page.course.edit', compact('course' , 'classes','sections'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'class_id'=>['nullable'],
            'section_name'=>['nullable'],
            'description' => ['nullable','string'],
            'price' => ['nullable','string'],            
            'type' => ['required'],
           
        ]);

        $course = Course::findOrFail($id);       

        $course->name = $request->name;  
        $course->class_id = $request->class_id; 
        $course->section_name = $request->section_name;
        if($request->type=='Paid'){
            $course->price = $request->price; 
        }else{
            $course->price = 0; 
        }     
        $course->type = $request->type;  

        $course->save();

        return redirect()->route('admin.course.index')->with('success', 'Course updated successfully.');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('admin.course.index')->with('success', 'Course deleted successfully.');
    }
}
