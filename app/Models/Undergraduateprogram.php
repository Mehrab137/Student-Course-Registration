<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Undergraduateprogram extends Model
{
    use HasFactory;

    public $table = "undergraduateprograms";

    public function students()
    {
        return $this->hasMany('App\Models\Student', 'program_id', 'id');
    }
}
