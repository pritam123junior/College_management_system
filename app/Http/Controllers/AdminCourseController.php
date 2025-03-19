<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\ClassData;
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
    public function courseCreate($id)
    {      $course = Course::find($id);
       
        return view('admin.page.course.create' , compact('course'));
    }
    public function classcreate($id)
    {    $class = Course::find($id);
        
        return view('admin.page.course.create' , compact('class'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'class_id'=>['nullable'],
            'description' => ['nullable','string'],
            'price' => ['nullable','string'],            
            'type' => ['required'],
        ]);

        Course::create([
            'class_id'=>$request->class_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,            
            'type' => $request->type,
           
        ]);

        return redirect()->route('admin.course.index')->with('success', 'Course added successfully.');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $classes = classData::all();
        return view('admin.page.course.edit', compact('course' , 'classes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required','string','max:255'],
            'class_id'=>['required'],
            'description' => ['nullable','string'],
            'price' => ['nullable','string'],            
            'type' => ['required'],
           
        ]);

        $course = Course::findOrFail($id);       

        $course->name = $request->name;  
        $course->class_id = $request->class_id; 
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
