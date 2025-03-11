<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use App\Models\ClassData;
use Illuminate\Http\Request;
use  Hash;
class AdminTeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::get(); 
        return view('admin.page.teacher.index', compact('teachers'));
    }
    public function create()
    {
        $classes= ClassData::all(); // Fetch all available classes from the database
        return view('admin.page.teacher.create', compact('classes'));
    }
    public function store(Request $request)
    {  
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:teachers'],
            'password' => ['required'],           
            'mobile' => ['nullable', 'string', 'max:255']            
        ]);

        teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),     
            'mobile' => $request->mobile,
        ]);

        return redirect()->route('admin.teacher.index')->with('success', 'Teacher added successfully.');
    }
    public function edit($id)
    {
        $teacher = teacher::findOrFail($id);
       
        return view('admin.page.teacher.edit', compact('teacher'));
    }

    /**
     * Update teacher details
     */
    public function update(Request $request, $id)
    {
        $teacher = teacher::findOrFail($id);

    /*    $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', "unique:teachers,email,$id"],
            'data_class_id' => ['required', 'exists:data_classes,id'],
            'mobile' => ['nullable', 'string', 'max:20'],
            'section' => ['nullable', 'string', 'max:10'],
        ]);
*/
        $teacher->update([
            'name' => $request->name,
            'email' => $request->email,
            
            'mobile' => $request->mobile,
            'section' => $request->section,
        ]);

        return redirect()->route('admin.teacher.index')->with('success', 'teacher updated successfully.');
    }

    /**
     * Delete a teacher
     */
    public function destroy($id): RedirectResponse
    {
        teacher::findOrFail($id)->delete();
        return redirect()->route('admin.teacher.index')->with('success', 'teacher deleted successfully.');
    }
}
