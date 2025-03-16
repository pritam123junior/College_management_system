<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ClassData;
use App\Models\Student;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {

        $classes=ClassData::select('id','name')->get();

        return view('student.auth.register',compact('classes'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {       
        $request->validate([
           'name' => ['required', 'string', 'max:255'],
           'password' => ['required','string','same:confirm_password'],
            'class_id' => ['required'],
            'section_id' => ['required'],
            'mobile' => ['required', 'string', 'max:255']            
        ]);

        $user = User::create([            
            'password' => Hash::make($request->password),
            'mobile' => $request->mobile, 
            'type' => 'Student',
            'approve_status' => 'Pending'
        ]);

        Student::create([
            'name' => $request->name,
            'user_id' => $user->id,
            'class_id' => $request->class_id,
            'section_id' => $request->section_id                    
        ]);   
        
        User::where('id', $user->id)            
            ->update(['user_id' => 's'.$user->id]);
                

        return back()->with('status', 'Student registration successful! Wait for approval.');
    }
}
