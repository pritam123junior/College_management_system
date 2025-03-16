<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\ClassData;
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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'string', 'lowercase', 'email', 'max:255', 'unique:'.user::class],
            'password' => ['required', 'confirmed'],
        ]);

        $request->validate([
           'name' => ['required', 'string', 'max:255'],
           'password' => ['required', 'confirmed'],
            'class_id' => ['required'],
            'section_id' => ['required'],
            'mobile' => ['nullable', 'string', 'max:255'],
            'approve_status' => ['required', 'string']
        ]);

        $user = User::create([            
            'password' => Hash::make($request->password),
            'mobile' => $request->mobile, 
            'type' => 'Student',
            'approve_status' => $request->approve_status
        ]);

        Student::create([
            'name' => $request->name,
            'user_id' => $user->id,
            'class_id' => $request->class_id,
            'section_id' => $request->section_id                    
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'approve_status' => 'Not Approved'
        ]);

        event(new Registered($user));        

        return 0;
    }
}
