<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataClass;
use App\Models\Section;

class ClassController extends Controller
{
    public function index()
    {
        $classes = DataClass::with('sections')->paginate(10);
        return view('admin.page.class.index', compact('classes'));
    }

    public function create()
    {
        return view('admin.page.class.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:data_classes,name',
            'sections' => 'array'
        ]);

        $class = DataClass::create(['name' => $request->name]);

        if ($request->sections) {
            foreach ($request->sections as $sectionName) {
                Section::create(['name' => $sectionName, 'class_id' => $class->id]);
            }
        }

        return redirect()->route('admin.page.class.index')->with('success', 'Class added successfully!');
    }

    public function edit(DataClass $class)
    {
        return view('admin.page.class.edit', compact('class'));
    }

    public function update(Request $request, DataClass $class)
    {
        $request->validate([
            'name' => 'required|unique:data_classes,name,' . $class->id,
            'status' => 'required|in:active,inactive'
        ]);

        $class->update(['name' => $request->name, 'status' => $request->status]);

        return redirect()->route('admin.page.class.index')->with('success', 'Class updated successfully!');
    }

    public function destroy(DataClass $class)
    {
        $class->delete();
        return redirect()->route('admin.page.class.index')->with('success', 'Class deleted successfully!');
    }
}
