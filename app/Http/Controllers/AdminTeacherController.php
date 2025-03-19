<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use App\Models\User;
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
        
        return view('admin.page.teacher.create');
    }
    public function store(Request $request)
    {  
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required'],           
            'mobile' => ['required', 'string', 'max:255']            
        ]);

        $user = User::create([            
            'password' => Hash::make($request->password),
            'type' => 'Teacher',
            'email' => $request->email,              
            'mobile' => $request->mobile,
        ]);

        teacher::create([
            'name' => $request->name,
            'user_id' => $user->id           
        ]);

        User::where('id', $user->id)            
            ->update(['user_identity' => 't'.$user->id]);

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
      
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['nullable'],           
            'mobile' => ['required', 'string', 'max:255']            
        ]);

        $teacher = teacher::find($id);   
        
        $user = User::find($teacher->user_id); 
        $user->email = $request->email;  
        if($request->password){
            $user->password = $request->password; 
        }     
        $user->mobile = $request->mobile;  
        $user->save();

        $teacher->update([
            'name' => $request->name            
        ]);           
        
        return redirect()->route('admin.teacher.index')->with('success', 'Teacher updated successfully.');
    }

    /**
     * Delete a teacher
     */
    public function destroy($id)
    {
        teacher::findOrFail($id)->delete();
        return redirect()->route('admin.teacher.index')->with('success', 'Teacher deleted successfully.');
    }
}
