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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class_id'=>['nullable'],
            'description' => 'nullable|string',
            'price' => 'nullable|string',
            'duration' => 'nullable|string',
            'type' => 'required|in:paid,free',
        ]);

        Course::create([
            'class_id'=>$request->class_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'duration' => $request->duration,
            'type' => $request->type,
           
        ]);

        return redirect()->route('admin.courses.index')->with('success', 'Course created and pending approval.');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        $classes = classData::all();
        return view('admin.page.course.edit', compact('course , classes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'class_id' => ['required', 'exists:data_classes,id'],
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|string',
            'duration' => 'required|string',
            'type' => 'required|in:paid,free',
           
        ]);

        $course = Course::findOrFail($id);
        $course->update($request->all());

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully.');
    }
}
