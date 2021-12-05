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
        $courses = Course::all();

        return view('assign_faculty', compact('departments', 'courses'));

    }
}
