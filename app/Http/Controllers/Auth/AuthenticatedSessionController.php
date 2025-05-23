<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use App\Http\Requests\Auth\TeacherLoginRequest;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
   
    public function adminCreate(): View
    {
        return view('admin.auth.login');
    }

    
    public function adminStore(AdminLoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard', absolute: false));
    }
    
    //teacher login

    public function teacherCreate(): View
    {
        return view('teacher.auth.login');
    }
   
    public function teacherStore(TeacherLoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(route('teacher.dashboard', absolute: false));
    }


     //student login

     public function studentCreate(): View
     {
         return view('student.auth.login');
     }
    
     public function studentStore(LoginRequest $request): RedirectResponse
     {
         $request->authenticate();
 
         $request->session()->regenerate();
         
 
         return redirect()->intended(route('dashboard', absolute: false));
     }






    
    public function destroy(Request $request): RedirectResponse
    {

        $type=Auth::user()->type;

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if($type=='Admin'){
            return redirect()->route('admin.login');
        }
        elseif($type=='Teacher'){
            return redirect()->route('teacher.login');
        }
        elseif($type=='Student'){
            return redirect()->route('login');
        }
        
    }
}
