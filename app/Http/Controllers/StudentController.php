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
         $Sections = Section::all();
         $SessionYears = SessionYear::all();
        return view('backend.students.studends', compact('classes','Sections','SessionYears'));
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

   public function list(){
        $students = Student::with(['studentClass', 'section', 'session'])->get();
        return view('backend.studentlist.studentlist', compact('students'));
    }
}
