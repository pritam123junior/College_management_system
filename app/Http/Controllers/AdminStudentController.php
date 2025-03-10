<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\DataClass;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
class AdminStudentController extends Controller
{ public function index(): View
    {
        $students = Student::get(); 
        return view('admin.page.student.index', compact('students'));
    }
    public function create(): View
    {
        $dataclasses= DataClass::all(); // Fetch all available classes from the database
        return view('admin.page.student.create', compact('dataclasses'));
    }
    public function store(Request $request)
    {  //  return $request->all();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:students'],
            'password' => ['required'],
            'data_class_id' => ['required'],
            'mobile' => ['nullable', 'string', 'max:20'],
            'section' => ['nullable', 'string', 'max:10'],
        ]);

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'data_class_id' => $request->data_class_id,
            'mobile' => $request->mobile,
            'section' => $request->section,
        ]);

        return redirect()->route('admin.student.index')->with('success', 'Student created successfully.');
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
