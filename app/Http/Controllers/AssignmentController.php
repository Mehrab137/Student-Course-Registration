<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Department;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Section;

class AssignmentController extends Controller
{
    public function assignFacultyView()
    {
       
        $departments = Department::all();

        return view('assign_faculty', compact('departments'));

    }

    public function assignFacultySubmit(Request $request)
    {
        $courses = Course::where('department_id', '=', $request->department_id)->get(['course_name','id']);
        $faculty = Faculty::where('department_id', '=', $request->department_id)->get(['faculty_name','id']);

        return response()->json([]);
        
    }
}
