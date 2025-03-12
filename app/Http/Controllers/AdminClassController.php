<?php

namespace App\Http\Controllers;
use App\Models\ClassData;
use App\Models\Section;
use Illuminate\Http\Request;

class AdminClassController extends Controller
{
    public function index()
    {
         $classes = ClassData::all();
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
            'sections' => 'array'
        ]);

        $class = ClassData::create(['name' => $request->name]);

        if ($request->sections) {
            foreach ($request->sections as $sectionName) {
                Section::create(['name' => $sectionName, 'class_id' => $class->id]);
            }
        }

        return redirect()->route('admin.classes.index')->with('success', 'Class added successfully!');
    }

    public function edit($id)
    {
        $class=DataClass::find($id);
        return view('admin.page.class.edit', compact('class'));
    }

    public function update($id,Request $request)
    {
        $request->validate([
            'name' => 'required|unique:classes,name,' . $id
        ]);
        $class = DataClass::find($id);

        $class->update(['name' => $request->name]);

        return redirect()->route('admin.classes.index')->with('success', 'Class updated successfully!');
    }

    public function delete($id)
    {
        DataClass::destroy($id);
        return redirect()->route('admin.classes.index')->with('success', 'Class deleted successfully!');
    }
}
