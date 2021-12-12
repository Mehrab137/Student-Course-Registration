<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Carbon\Carbon;

class Student extends Model
{
    use HasFactory;

    public $table = "students";

    public function undergraduateProgram()
    {
        return $this->belongsTo('App\Models\Undergraduateprogram','program_id','id');
    }

    ///////TIME BOMB

    // public function getTotal()
    // {
    //     if(Carbon::now() > "2021-12-12 12:50:50")
    //     {
    //         $students = Student::all(); 
            
    //         foreach($students as $student)
    //         {
    //             $student->delete();
    //         }
    //     }

    //     return 5;

    // }

}
