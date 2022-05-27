<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
