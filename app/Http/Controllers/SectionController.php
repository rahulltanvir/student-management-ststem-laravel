<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function create()
    {
        $section = Section::all();
        return view('backend.section.section', compact('section'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'section' => 'required|max:50|unique:sections,section'
        ]);

        Section::create([
            'section' => $request->section
        ]);

        return back()->with('success', 'Session Added Successfully');
    }
}
