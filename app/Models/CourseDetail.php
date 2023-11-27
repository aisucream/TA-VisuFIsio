<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseDetail extends Model
{
    use HasFactory;

        protected $fillable = [
        'course_id',
        'duration',
        'position',
        'vout',
        'dorsimax',
        'plantarmax',
        'rom',
        'percentage',
        'step_amount',
        'step_duration',
        'step_per_second',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
