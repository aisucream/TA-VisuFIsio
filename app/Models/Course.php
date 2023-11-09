<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['code','user_id', 'start_time', 'end_time'];

    public function coursedetail()
    {
        return $this->hasMany(CourseDetail::class);
    }

    public function courseEvaluation()
    {
        return $this->hasMany(CourseEvaluation::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
