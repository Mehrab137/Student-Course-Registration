<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Undergraduateprogram;
use App\Models\Department;
use App\Models\Course;
use App\Models\Section;
use App\Models\Student;
use Storage;


class UndergraduateController extends Controller
{
   
    public function addUndergradView()
    {
        return view('add.add_undergradprograms');
    }

    public function addUndergradSubmit(Request $request)
    {
        $validator = $request->validate([

            'UP_name' => 'required|unique:undergraduateprograms,UP_name|max:50',

            'total_credits' => 'required|digits:3',

        ],
        [

            'UP_name.required' => 'The Undergraduate Program field is required',

            'UP_name.unique' => 'The Undergraduate Program already exists',

            'UP_name.max' => 'The Undergraduate Program name can not be this long xD',

            'total_credits.required' => 'The Total Credits field is required',

            'total_credits.digits' => 'Invalid Total Credits'

        ]);

        $undergrad = new Undergraduateprogram();

        $undergrad->UP_name =  $request->UP_name; 

        $undergrad->total_credits =  $request->total_credits; 

        $undergrad->save();

        $alert = [

            'alert_msg' => 'Undergraduate Program Added Successfully !'

        ];

        return redirect()->route('add.undergrad.view')->with($alert);

    }

    public function addDepartmentView()
    {
        return view('add.add_departments');
    }
    
    public function addDepartmentSubmit(Request $request)
    {
        $validator = $request->validate([

            'dept_name' => 'required|unique:departments,dept_name|max:50'

        ],
        [

            'dept_name.required' => 'The Department Name field is required',

            'dept_name.unique' => 'The Department Name already exists'

        ]);

        $department = new Department();

        $department->dept_name = $request->dept_name;

        $department->save();

        $alert = [

            'alert_msg' => 'Department Added Successfully !'

        ];

        return redirect()->route('add.dept.view')->with($alert);

    }

    public function addCourseView()
    {
        $departments = Department::all();

        return view('add.add_courses', compact('departments'));
    }

    public function addCourseSubmit(Request $request)
    {
        $validator = $request->validate([

            'course_name' => 'required|unique:courses,course_name|max:50',

            'course_credit' => 'required',

            'department_id' => 'required'

        ],
        [
            'course_name.required' => 'The Course Name field is required',

            'course_name.unique' => 'Course Name already exists',
            
            'course_credit.required' => 'The Credits field is required',

            'department_id.required' => 'Selecting Department is required'

        ]);

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
        return view('add.add_sections' , compact('courses'));    
    }

    public function addSectionSubmit(Request $request)
    {
        $validator = $request->validate([

            'section_name' => 'required',

            'start_time' => 'required',

            'end_time' => 'required',

            'days' => 'required',

            'total_seats' => 'required',

            'course_id' => 'required'

        ],
    [

        'section_name.required' => 'The Section Name field is required',

        'start_time.required' => 'The Start Time field is required',

        'end_time.required' => 'The End Time field is required',

        'days.required' => ' The Days field is required',

        'total_seats.required' => 'The Total Seats field is required',

        'course_id.required' => 'Selecting Course is required'

    ]);

        $sections = Section::where('section_name', '=', $request->section_name)
                                ->where('course_id', '=', $request->course_id)
                                ->get();
        
        if(count($sections) > 0)
        {
             return back();
        }

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

        return view('add.add_students' , compact('programs'));
    }
    
    public function addStudentSubmit(Request $request)
    {

        $validator = $request->validate([

            'student_name' => 'required|max:50',

            'email_id' => 'required|email|unique:students,email_id',

            'contact_number' => 'required|digits:11|unique:students,contact_number',

            'address' => 'required|max:100',

            'date_of_birth' => 'required',

            'program_id' => 'required',

            'student_profile_picture' => 'mimes:jpg,jpeg,png'

        ],
    [

        'student_name.required' => 'Student Name field is required',

        'email_id.required' => 'Email field is required',

        'email_id.email' => 'Insert valid Email address',

        'email_id.unique' => 'The Email already exists ',

        'contact_number.required' => 'Contact Number field is required',

        'contact_number.unique' => 'The Contact Number already exists',

        'address.required' => 'Address field is required',

        'date_of_birth.required' => 'Date of Birth field is required',

        'program_id.required' => 'Selecting Undergraduate Program is required',

        'student_profile_picture.mimes' => 'Image file type must be jpg/jpeg/png'

    ]);
 
        $student = new Student();

        $student->student_id = date('y') . date('d');
        
        $student->student_name = $request->student_name;

        $student->email_id = $request->email_id;

        $student->contact_number = $request->contact_number;

        $student->address = $request->address;

        $student->date_of_birth = $request->date_of_birth;

        if($request->file('student_profile_picture')){

            $student_profile_picture_name = time().'.'.$request->file('student_profile_picture')->getClientOriginalExtension();  

            $student_profile_picture_path = $request->student_profile_picture->storeAs('public/images', $student_profile_picture_name);

            $student->student_profile_picture = $student_profile_picture_path;
        }


        $student->program_id = $request->program_id;

        $student->save();

        $student->student_id .= $student->id;

        // $student->student_id = $student->student_id . $student->id;

        $student->save(); 

        $alert = [

            'alert_msg' => 'Student Added Successfully !'

        ];

        return redirect()->route('add.student.view')->with($alert);

    }

    public function viewUndergradList()
    {

        $undergraduateprograms = Undergraduateprogram::select(['id','UP_name','total_credits'])->get();
        
        return view('view.view_undergraduate_programs',['undergraduateprograms' => $undergraduateprograms]);

    }

    public function viewDepartmentList()
    {

        $departments = Department::select(['id','dept_name'])->get();

        return view('view.view_department', ['departments' => $departments]);

    }

    public function viewCourseList()
    {

        $courses = Course::with(['department'])->get();

        return view('view.view_courses', ['courses' => $courses]);

    }

    public function viewSectionList()
    {

        $sections = Section::with(['course'])->get();

        return view('view.view_sections', ['sections' => $sections]);

    }

    public function viewStudentList()
    {

        $students = Student::with(['undergraduateProgram'])->get();

        return view('view.view_students', ['students' => $students]);

    }

    public function editUndergradView($undergrad_id)
    {

        $undergrad = Undergraduateprogram::find($undergrad_id);

        return view('edit.edit_undergraduate_programs',compact('undergrad'));

    }

    public function editUndergradSubmit(Request $request, $undergrad_id)
    {

        $undergrad = Undergraduateprogram::find($undergrad_id);

        $undergrad->UP_name = $request->UP_name;
        
        $undergrad->total_credits = $request->total_credits;

        $undergrad->save();

        $alert = [

            'alert_msg' => 'Undergraduate Program Edited Successfully !'

        ];

        return back()->with($alert);

    }

    public function editDepartmentView($department_id)
    {
        $department = Department::find($department_id);

        return view('edit.edit_department', compact('department'));
    }

    public function editDepartmentSubmit(Request $request, $department_id)
    {
        
        $department = Department::find($department_id);

        $department->dept_name = $request->dept_name;

        $department->save();

        $alert = [

            'alert_msg' => 'Department Edited Successfully !'

        ];

        return back()->with($alert);

    }

     public function editCourseView($course_id)
    {

        $course = Course::with(['department'])->find($course_id);

        $departments = Department::all();

        return view('edit.edit_courses', compact('course', 'departments'));

    }

    public function editCourseSubmit(Request $request, $course_id)
    {

        $course = Course::with(['department'])->find($course_id);
        
        $departments = Department::all();

        $course->course_name = $request->course_name;

        $course->course_credit = $request->course_credit;

        $course->department_id = $request->department_id;

        $course->save();

        $alert = [

            'alert_msg' => 'Course Edited Successfully !'

        ];

        return back()->with($alert);

    }

    public function editSectionView($section_id)
    {

        $section = Section::with(['course'])->find($section_id);

        $courses = Course::all();

        return view('edit.edit_sections', compact('section', 'courses'));

    }

    public function editSectionSubmit(Request $request, $section_id)
    {

        $section = Section::with(['course'])->find($section_id);

        $courses = Course::all();

        $section->section_name = $request->section_name;

        $section->start_time = $request->start_time;

        $section->end_time = $request->end_time;

        $section->days = $request->days;

        $section->total_seats = $request->total_seats;

        $section->course_id = $request->course_id;

        $section->save();

        $alert = [

            'alert_msg' => 'Section Edited Successfully !'

        ];

        return back()->with($alert);

    }

    public function editStudentView($student_id)
    {

        $student = Student::with(['undergraduateProgram'])->find($student_id);

        $programs = Undergraduateprogram::all();

        return view('edit.edit_students', compact('student', 'programs'));

    }

    public function editStudentSubmit(Request $request, $student_id)
    {

        $student = Student::with(['undergraduateProgram'])->find($student_id);

        $programs = Undergraduateprogram::all();

        $student->student_id = $request->student_id;

        $student->student_name = $request->student_name;

        $student->email_id = $request->email_id;

        $student->contact_number = $request->contact_number;

        $student->address = $request->address;

        $student->date_of_birth = $request->date_of_birth;

        if($request->file('student_profile_picture')){

            $student_profile_picture_name = time().'.'.$request->file('student_profile_picture')->getClientOriginalExtension();  

            $student_profile_picture_path = $request->student_profile_picture->storeAs('public/images', $student_profile_picture_name);

            $student->student_profile_picture = $student_profile_picture_path;
        }

        $student->program_id = $request->program_id;

        $student->save();

        $alert = [

            'alert_msg' => 'Section Edited Successfully !'

        ];

        return back()->with($alert);

    }

    public function deleteUndergrad(Request $request)
    {

        $undergrad = Undergraduateprogram::find($request->undergrad_id);

        $undergrad->delete();

        $alert = [

            'alert_msg' => 'Undergraduate Program Deleted Successfully'

        ];

        return back()->with($alert);

    }

    public function deleteDepartment(Request $request)
    {

        $department = Department::find($request->department_id);

        $department->delete();

        $alert = [

            'alert_msg' => 'Department Deleted Successfully'

        ];

        return back()->with($alert);

    }

    public function deleteCourse(Request $request)
    {

        $course = Course::find($request->course_id);

        $course->delete();

        $alert = [

            'alert_msg' => 'Course Deleted Successfully'

        ];

        return back()->with($alert);

    }

    public function deleteSection(Request $request)
    {

        $section = Section::find($request->section_id);

        $section->delete();

        $alert = [

            'alert_msg' => 'Section Deleted Successfully !'

        ];

        return back()->with($alert);

    }

    public function deleteStudent(Request $request)
    {

        $student = Student::find($request->student_id);

        $student->delete();

        $alert = [

            'alert_msg' => 'Student Deleted Successfully !'

        ];

        return back()->with($alert);

    }

}