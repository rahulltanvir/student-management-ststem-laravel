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

        return back()->with('success', 'Section Added Successfully');
    }

    public function edit($id){
        $section=Section::findOrFail($id);
        return view('backend.editsection.edit', compact('section'));
    }

    public function update(Request $request, $id){
        $section = Section::findOrFail($id);
        $request->validate([
            'up_section'=> 'required|max:50|unique:sections,section,' .$id ] );

            $section->update([
                'section'=>$request->up_section
            ]);
            return redirect()->route('section')->with('success', 'Updated Successfully');
    }
    public function destroy($id){
        Section::findOrFail($id)->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}
