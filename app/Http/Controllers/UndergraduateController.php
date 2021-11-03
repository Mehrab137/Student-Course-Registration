<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Undergraduateprogram;
use App\Models\Department;


class UndergraduateController extends Controller
{
    public function addUndergradView()
    {
        return view('add_undergradprograms');
    }

    public function addUndergradSubmit(Request $request)
    {
       
        $undergrad = new Undergraduateprogram();
        $undergrad->UP_name =  $request->UP_name; 
        $undergrad->total_credits =  $request->total_credits; 
        $undergrad->save();

        return redirect()->route('add.undergrad.view');

    }

    public function addDepartmentView()
    {
        return view('add_departments');
    }
    
    public function addDepartmentSubmit(Request $request)
    {
        
        $department = new Department();
        $department->dept_name = $request->dept_name;
        $department->save();

        return redirect()->route('add.dept.view');

    }
}

