<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
      public function index(Request $request)
    {
        $totalStudent= Student::count();
        $recentStudents = Student::latest()->take(5)->get();
        $ActiveStudent = Student::where('std_status', 'Active')->count();
        $InactiveStudent = Student::where('std_status', 'Inactive')->count();
        return view('dashboard', compact('totalStudent','ActiveStudent','InactiveStudent','recentStudents'));
    }
}
