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

    public function edit($id){
        $session_data=SessionYear::findOrFail($id);
        return view('backend.editsessions.edit', compact('session_data'));
    }

    public function update(Request $request, $id){
        $session_data=SessionYear::findOrFail($id);
        $request->validate([
            'up_session'=>'required|max:50|unique:session_years,sessionyear,'. $id
        ]);
       $session_data->update([
        'sessionyear'=>$request->up_session
       ]);
    //    $section->update([
    //             'section'=>$request->up_section
    //         ]);
        return redirect()->route('session-year')->with('success','Session Update Successfully');
    }

    public function destroy($id){
        SessionYear::findOrFail($id)->delete();
        return back()->with('success','Session Delete Successfully');
    }
}
