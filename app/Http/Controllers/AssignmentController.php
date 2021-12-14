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

    public function getCourse(Request $request)
    {
    
        $courses = Course::where('department_id', '=', $request->department_id)->get(['course_name','id']);

        return response()->json($courses);
        
    }

    public function getFaculty(Request $request)
    {
        
        $faculty = Faculty::where('department_id', '=', $request->department_id)->get(['faculty_name','id']);

        return response()->json($faculty);

    }

    public function getSection(Request $request)
    {

        $section = Section::where('course_id', '=', $request->course_id)->get(['section_name','id']);

        return response()->json($section);

    }

    public function  assignFacultySubmit(Request $request)
    {

        $faculty = Faculty::find($request->faculty_id);
        
        $faculty->course_id = $request->course_id;
        $faculty->section_id = $request->section_id;

        $faculty->save();

        return back();

    }

    public function assignFacultyViewSchedule()
    {

        $faculty = Faculty::all();

        return view('view.view_faculty_schedule', compact('faculty'));

    }
}
