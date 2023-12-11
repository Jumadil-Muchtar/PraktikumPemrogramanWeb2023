<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_name', 'description', 'start_date', 'end_date', 'instructor',
    ];


    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
