<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
}
