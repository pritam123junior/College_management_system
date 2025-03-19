<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Result;
use App\Models\ClassData;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ExamController extends Controller
{
    // List Exams
    public function index()
    {
        $exams = Exam::all();
        return view('teacher.page.exam.index', compact('exams'));
    }

    // Show Create Exam Form
    public function create()
    {
        $classes = ClassData::get(); 
        $courses= Course::get();
        return view('teacher.page.exam.create', compact('classes','courses'));
    }

    // Store a New Exam
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'type' => 'required|in:practice,live',
            'version' => 'required|in:english,bangla',
            'course_id' => ['nullable'],
            'class_id'=>['nullable'],
            'duration' => 'required|integer|min:1',
        ]);

        Exam::create([
            'user_id' => Auth::id(),  
            
            'title'=>$request->title,
            'type'=>$request->type,
            'version' => $request->version,
            'course_id' => $request->course_id,
            'class_id' => $request->class_id,
                        
            'duration' => $request->duration,
                        
           
           
        ]);

        return redirect()->route('teacher.exam.index')->with('success', 'Exam created successfully!');
    }

    // Show Single Exam
    public function show($id)
    {
        $exam = Exam::findOrFail($id);
        return view('teacher.page.exam.show', compact('exam'));
    }

    // Show Edit Form
    public function edit($id)
    {
        $exam = Exam::findOrFail($id);
        $courses = Course::where('class_id',$exam->class_id)->get();
         $classes = classData::get();
        return view('teacher.page.exam.edit', compact('exam','courses' , 'classes'));
    }

    // Update Exam
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string',
            'type' => 'required|in:practice,live',
            'version' => 'required|in:english,bangla',
            'course_id' => ['nullable'],
            'class_id'=>['nullable'],
            'duration' => 'required|integer|min:1',
        ]);

        $exam = Exam::findOrFail($id);
        $exam->update($request->all());

        return redirect()->route('teacher.exam.index')->with('success', 'Exam updated successfully!');
    }

    // Delete Exam
    public function destroy($id)
    {
        $exam = Exam::findOrFail($id);
        $exam->delete();

        return redirect()->route('teacher.exam.index')->with('success', 'Exam deleted successfully!');
    }
    public function view($id)
    {
        $exans = Exam::all();
    $questions = Question::where('exam_id',$id)->get();

        return view('teacher.page.qustion.index', compact( 'exams','questions'));
    }
}
