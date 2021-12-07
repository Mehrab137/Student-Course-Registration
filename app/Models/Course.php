<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    public $table = "courses";
    protected $fillable = ['course_name', 'course_credit'];

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function sections()
    {
        return $this->hasMany('App\Models\Section');
    }

    public function faculty()
    {
        return $this->hasOne('App\Models\Faculty');
    }
}
