<?php

namespace App\Http\Controllers;
use App\Models\ClassData;
use App\Models\Section;
use Illuminate\Http\Request;

class AdminClassController extends Controller
{
    public function index()
    {
         $classes = ClassData::with('sections')->get();
        return view('admin.page.class.index', compact('classes'));
    }

    public function create()
    {
        return view('admin.page.class.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:classes,name',
            
        ]);

        $class = ClassData::create(['name' => $request->name]);

        if ($request->sections) {
            foreach ($request->sections as $section) {
                Section::create(['name' => $section, 'class_id' => $class->id]);
            }
        }

        return redirect()->route('admin.class.index')->with('success', 'Class added successfully!');
    }

    public function edit($id)
    {

        $class=ClassData::find($id);
        $sections=Section::where('class_id',$id)->get();

        return view('admin.page.class.edit', compact('class','sections'));
    }

    public function update($id,Request $request)
    {
        $request->validate([
            'name' => 'required|unique:classes,name,' . $id
        ]);

        $class = ClassData::find($id);

        $class->update(['name' => $request->name]);  
        

        if ($request->sections) {

            Section::where('class_id',$id)->delete();      
        
            foreach ($request->sections as $section) {
                Section::create(['name' => $section, 'class_id' => $id]);
            }
           
        }

        return redirect()->route('admin.class.index')->with('success', 'Class updated successfully!');
    }

    public function destroy($id)
    {
        ClassData::destroy($id);

        return redirect()->route('admin.class.index')->with('success', 'Class deleted successfully!');
    }
}
