<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    public $table = "sections";

    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }

    public function faculty()
    {
        return $this->hasOne('App\Models\Faculty');
    }
}
