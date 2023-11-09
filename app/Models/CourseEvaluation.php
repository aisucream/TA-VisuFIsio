<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseEvaluation extends Model
{
    use HasFactory;

    protected $fillable = [
        "course_id",
        "user_id",
        "nama",
        "evaluasi",
    ];

    public function Course()
    {
        return $this->belongsTo(Course::class);
    }

    public function UserEvaluation()
    {
        return $this->belongsTo(User::class);
    }
}
