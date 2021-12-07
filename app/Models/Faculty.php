<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty extends Model
{
    use HasFactory;

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function course()
    {
        return $this->hasOne('App\Models\Course');
    }

    public function section()
    {
        return $this->hasOne('App\Models\Section');
    }
}
