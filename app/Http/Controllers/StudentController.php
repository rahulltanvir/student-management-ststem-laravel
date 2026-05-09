<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\SchoolClass;
use App\Models\Section;
use App\Models\SessionYear;

class StudentController extends Controller
{
    
    public function create(){
         $classes = SchoolClass::all();
         $sections = Section::all();
         $sessionYears = SessionYear::all();
        return view('backend.students.studends', compact('classes','sections','sessionYears'));
    }
 public function store(Request $request)
    {
        $request->validate([
            'std_name' => 'required|max:50',
            'std_roll' => 'required|unique:students,std_roll',
            'std_class' => 'required|exists:school_classes,id',
            'std_section' => 'required|exists:sections,id',
            'std_session' => 'required|exists:session_years,id',
            'std_phn' => 'nullable|max:11',
            'std_status' => 'required|in:Active,Inactive'
        ]);

        Student::create([
            'std_name' => $request->std_name,
            'std_roll' => $request->std_roll,
            'std_class_id' => $request->std_class,
            'std_section_id' => $request->std_section,
            'std_session_id' => $request->std_session,
            'std_phn' => $request->std_phn,
            'std_status' => $request->std_status,
        ]);

        return redirect()->back()->with('success', 'Student added successfully!');
    }

public function list()
{
    $students = Student::with(['studentClass', 'section', 'session'])->get();

    return view('backend.studentlist.studentlist', compact('students'));
}

    public function edit($id){
        $students=Student::findOrFail($id);
        $classes = SchoolClass::all();
         $sections = Section::all();
         $sessionYears = SessionYear::all();
        return view('backend.editstudent.edit', compact('students','classes','sections','sessionYears'));
    }

    public function update(Request $request, $id){
         $students=Student::findOrFail($id);
         $request->validate([
            'up_name' => 'nullable|max:50',
            'up_roll' => 'nullable|unique:students,std_roll'.$id,
            'up_class' => 'nullable|exists:school_classes,id',
            'up_section' => 'nullable|exists:sections,id',
            'up_session' => 'nullable|exists:session_years,id',
            'up_phn' => 'nullable|max:11',
            'up_status' => 'nullable|in:Active,Inactive'
         ]);
         $students->update([
        'std_name' => $request->up_name ?? $students->std_name,

        'std_roll' => $request->up_roll ?? $students->std_roll,

        'std_class_id' => $request->up_class ?? $students->std_class_id,

        'std_section_id' => $request->up_section ?? $students->std_section_id,

        'std_session_id' => $request->up_session ?? $students->std_session_id,

        'std_phn' => $request->up_phn ?? $students->std_phn,

        'std_status' => $request->up_status ?? $students->std_status,
         ]);
         return redirect()->route('students.list')->with('success', 'Student updated successfully!');
    }

    public function destroy($id){
        Student::findOrFail($id)->delete();
        return back()->with('success', 'Student updated successfully!');
    }
   
}
