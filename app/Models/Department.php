<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    public $table = "departments";

    protected $fillable = ['dept_name'];

    public function courses()
    {
        return $this->hasMany('App\Models\Course');
    }

    public function faculties()
    {
        return $this->hasMany('App\Models\Faculty');
    }

}
