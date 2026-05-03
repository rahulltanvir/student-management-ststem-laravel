<?php

namespace App\Http\Controllers;

use App\Models\SessionYear;
use Illuminate\Http\Request;

class SessionYearController extends Controller
{
    public function create(){
        $Sessions=SessionYear::all();
        return view('backend.session.sessionyear', compact('Sessions')) ;
    }

    public function store(Request $request){
        $request->validate([
            'std_session' => 'required|max:50|unique:session_years,sessionyear' ]);

            SessionYear::create([
                'sessionyear'=>$request->std_session
            ]);
            return back()->with('success', 'Session Added Successfully');
    }
}
