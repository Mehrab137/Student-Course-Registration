<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public $table = "students";

    public function undergraduateProgram()
    {
        return $this->belongsTo('App\Models\Undergraduateprogram','program_id','id');
    }

    protected $primarykey = 'id';
}
