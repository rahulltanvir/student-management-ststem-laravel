<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolClass;

class SchoolClassController extends Controller
{
    public function create()
    {
        $classes = SchoolClass::all();
        return view('backend.class.class', compact('classes'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'add_class' => 'required|unique:school_classes,class_name'
        ]);

        SchoolClass::create([
            'class_name' => $request->add_class
        ]);

        return redirect()->route('class')->with('success', 'Class Added Successfully');
    }

    public function edit($id)
    {
        $class = SchoolClass::findOrFail($id);
        return view('backend.editclass.edit', compact('class'));
    }

    public function update(Request $request, $id)
{
    $class = SchoolClass::findOrFail($id);

    $request->validate([
        'up_class' => 'required|unique:school_classes,class_name,' . $id
    ]);

    $class->update([
        'class_name' => $request->up_class
    ]);

    return redirect()->route('class')->with('success', 'Updated Successfully');
}

    public function destroy($id)
    {
        SchoolClass::findOrFail($id)->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}