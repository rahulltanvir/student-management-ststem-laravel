<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
     public function index()
    {
        $totalStudent=Student::count();
        $ActiveStudent = Student::where('std_status', 'Active')->count();
        $InactiveStudent = Student::where('std_status', 'Inactive')->count();
        return view('dashboard', compact('totalStudent','ActiveStudent','InactiveStudent'));
    }
}
