<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\ClassData;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
class AdminStudentController extends Controller
{ public function index()
    {
        $students = Student::get(); 
        return view('admin.page.student.index', compact('students'));
    }
    public function create()
    {
        $classes= ClassData::all(); // Fetch all available classes from the database
        return view('admin.page.student.create', compact('classes'));
    }
    public function store(Request $request)
    {  
        $request->validate([
            'name' => ['required', 'string'],
            'password' => ['required', 'string'],
            'class_id' => ['required'],
            'section_id' => ['required'],
            'mobile' => ['nullable', 'string', 'max:20'],
            'approve_status' => ['required', 'string']
        ]);

        Student::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'class_id' => $request->class_id,
            'section_id' => $request->section_id,
            'mobile' => $request->mobile,
            'approve_status' => $request->approve_status

        ]);

        return redirect()->route('admin.student.index')->with('success', 'Student added successfully.');
    }
    public function edit($id): View
    {
        $student = Student::findOrFail($id);
        $classes = DataClass::all();
        return view('admin.page.student.edit', compact('student', 'classes'));
    }

    /**
     * Update student details
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $student = Student::findOrFail($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', "unique:students,email,$id"],
            'data_class_id' => ['required', 'exists:data_classes,id'],
            'mobile' => ['nullable', 'string', 'max:20'],
            'section' => ['nullable', 'string', 'max:10'],
        ]);

        $student->update([
            'name' => $request->name,
            'email' => $request->email,
            'data_class_id' => $request->data_class_id,
            'mobile' => $request->mobile,
            'section' => $request->section,
        ]);

        return redirect()->route('admin.student.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Delete a student
     */
    public function destroy($id): RedirectResponse
    {
        Student::findOrFail($id)->delete();
        return redirect()->route('admin.student.index')->with('success', 'Student deleted successfully.');
    }
}
