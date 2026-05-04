<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    
    public function create(){
        return view('backend.students.studends');
    }
}
