<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\ClassData;
use App\Models\Section;
use App\Models\Student;
use App\Models\User;
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
            'mobile' => ['nullable', 'string', 'max:255'],
            'approve_status' => ['required', 'string']
        ]);

        $user = User::create([            
            'password' => Hash::make($request->password),
            'mobile' => $request->mobile, 
            'type' => 'student',
            'approve_status' => $request->approve_status
        ]);

        Student::create([
            'name' => $request->name,
            'user_id' => $user->id,
            'class_id' => $request->class_id,
            'section_id' => $request->section_id                    
        ]);

      



        return redirect()->route('admin.student.index')->with('success', 'Student added successfully.');
    }
    public function edit($id): View
    {
        $student = Student::find($id);
        $classes = ClassData::all();
        $sections = Section::where('class_id',$student->class_id)->get();

        return view('admin.page.student.edit', compact('student', 'classes','sections'));
    }

    /**
     * Update student details
     */
    public function update(Request $request, $id): RedirectResponse
    {
             
        $request->validate([
            'name' => ['required', 'string'],
            'password' => ['nullable', 'string'],
            'class_id' => ['required'],
            'section_id' => ['required'],
            'mobile' => ['nullable', 'string', 'max:255'],
            'approve_status' => ['required', 'string']
        ]);

        $student = Student::find($id);      

        $user = User::find($student->user_id); 
        $user->approve_status = $request->approve_status;  
        if($request->password){
            $user->password = $request->password; 
        }     
        $user->mobile = $request->mobile;  
        $user->save();

        $student->update([
            'name' => $request->name,
            'class_id' => $request->class_id,
            'section_id' => $request->section_id                      
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

    public function statusApprove($id)
    {
        User::where('id', $id)            
            ->update(['approve_status' => 'Approved']);

        return redirect()->route('admin.student.index')->with('success', 'Student Approved.');
    }

    public function statusNotApprove($id)
    {
        User::where('id', $id)            
            ->update(['approve_status' => 'Not Approved']);

        return redirect()->route('admin.student.index')->with('success', 'Student Not Approved.');
    }

    public function statusToggle($id)
    {

        $status = User::where('id',$id)->value('approve_status');

        if($status=='Approved'){
            User::where('id', $id)            
            ->update(['approve_status' => 'Not Approved']);            
        }
        elseif($status=='Not Approved'){
            User::where('id', $id)            
            ->update(['approve_status' => 'Approved']);
        }     
        
        return redirect()->route('admin.student.index')->with('success', 'Student Approve Status Changed successfully.');
    }
}
