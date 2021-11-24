<?php

namespace App\Imports;

use App\Models\Course;
use App\Models\Department;
use Illuminate\Support\Collection;
// use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;

class CourseImport implements ToCollection
{
    // public function collection(Collection $rows)
    // {

    //     foreach($rows as $row){

    //         $course = Course::create([

    //             'course_name' => $row[0],
    //             'course_credit' => $row[1]

    //         ]);

    //         $course->department()->create([

    //             'department_id' => $row[2]

    //         ]);

    //     }

    // }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {

            $course = new Course();

            $course->course_name = $row[0];
            $course->course_credit = $row[1];
            $course->department_id = Department::where('dept_name', '=', $row[2])->first()->id;
            $course->save();

        }

    }
}
