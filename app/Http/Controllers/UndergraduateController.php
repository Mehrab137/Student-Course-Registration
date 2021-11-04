<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Undergraduateprogram;
use App\Models\Department;
use App\Models\Course;
use App\Models\Section;
use App\Models\Student;


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

    public function addCourseView()
    {
        $departments = Department::all();

        return view('add_courses', compact('departments'));
    }

    public function addCourseSubmit(Request $request)
    {
        $course = new Course();

        $course->course_name = $request->course_name;
        $course->course_credit = $request->course_credit;
        $course->department_id = $request->department_id;

        $course->save();

        $alert = [
            'alert_msg' => 'Course Added Successfully !'
        ];

        return redirect()->route('add.course.view')->with($alert);

    }

    public function addSectionView()
    {
        $courses = Course::all();
        return view('add_sections' , compact('courses'));    
    }

    public function addSectionSubmit(Request $request)
    {

        $section = new Section();

        $section->section_name = $request->section_name;
        $section->start_time = $request->start_time;
        $section->end_time = $request->end_time;
        $section->days = $request->days;
        $section->total_seats = $request->total_seats;
        $section->course_id = $request->course_id;
        $section->save();

        $alert = [
            'alert_msg' => 'Section Added Successfully !'
        ];

        return  redirect()->route('add.section.view')->with($alert);

    }

    public function addStudentView()
    {
        $programs = Undergraduateprogram::all();

        return view('add_students' , compact('programs'));
    }
    
    public function addStudentSubmit(Request $request)
    {
    
        $student = new Student();

        $student->student_id = $request->student_id;
        $student->student_name = $request->student_name;
        $student->email_id = $request->email_id;
        $student->contact_number = $request->contact_number;
        $student->address = $request->address;
        $student->date_of_birth = $request->date_of_birth;
        $student->program_id = $request->program_id;
        $student->save();

        $alert = [
            'alert_msg' => 'Student Added Successfully !'
        ];

        return redirect()->route('add.student.view')->with($alert);

    }


}

