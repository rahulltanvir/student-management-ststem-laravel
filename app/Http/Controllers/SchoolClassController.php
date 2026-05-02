<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SchoolClass;

class SchoolClassController extends Controller
{
    // show page (form + table)
    public function create()
    {
        $classes = SchoolClass::all();
        return view('backend.class.class', compact('classes'));
    }

    // store data
    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|max:50|unique:school_classes,class_name'
        ]);

        SchoolClass::create([
            'class_name' => $request->class_name
        ]);

        return back()->with('success', 'Class Added Successfully');
    }
}