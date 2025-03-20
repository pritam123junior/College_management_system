<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ClassData;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {

        $classes = ClassData::select('id', 'name')->get();

        return view('student.auth.register', compact('classes'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_student_id' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'same:confirm_password'],
            'class_id' => ['required'],
            'section_id' => ['required'],
            'mobile' => ['required', 'string', 'max:255'],
        ]);

        $user = User::create([
            'user_student_id' => $request->user_student_id, 
            'password' => Hash::make($request->password),
            'mobile' => $request->mobile,
            'type' => 'Student',
            'approve_status' => 'Pending',
        ]);

        Student::create([
            'name' => $request->name,
            'user_id' => $user->id,
            'class_id' => $request->class_id,
            'section_id' => $request->section_id,
        ]);        

        return back()->with('status', 'Student registration successful! Wait for approval.');
    }
}
