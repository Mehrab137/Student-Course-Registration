<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\DepartmentImport;
use App\Imports\CourseImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportController extends Controller
{
    public function importDepartmentView()
    {

        return view('import_departments');

    }

    public function importDepartmentSubmit(Request $request)
    {
        $this->validate($request, [
        
            'department_file' => 'required | mimes:xls,xlsx'
        
        ], [

            'department_file.required' => 'Please choose a file to add.',
            'department_file.mimes' => 'File type must be of xlsx or xls.'
        
        ]);

        $file = $request->file('department_file');

        Excel::import(new DepartmentImport, $file);

        $alert = [

            'alert_msg' => 'Your file uploaded Successfully !'

        ];

        return back()->with($alert);

    }

    public function importCourseView()
    {

        return view('import_courses');

    }

    public function importCourseSubmit(Request $request)
    {
        
        $this->validate($request, [
        
            'course_file' => 'required | mimes:xls,xlsx'
        
        ], [

            'course_file.required' => 'Please choose a file to add.',
            'course_file.mimes' => 'File type must be of xlsx or xls.'
        
        ]);

        $file = $request->file('course_file');

        Excel::import(new CourseImport, $file);

        $alert = [

            'alert_msg' => 'Your file uploaded Successfully !'

        ];

        return back()->with($alert);

    }
}
