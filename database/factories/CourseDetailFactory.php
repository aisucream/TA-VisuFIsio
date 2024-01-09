<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\CourseDetail;
use DateTime;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseDetailFactory extends Factory
{
 protected $model = CourseDetail::class;

    protected static $lastDuration = 0;
    protected static $lastPosition = 0;
    protected static $lastStepDuration = 1;

    public function definition()
    {
        $course = Course::inRandomOrder()->first();
        $courseId = $course->id;

        $duration = mt_rand(0, 60); // Set your initial duration manually
        $stepPerSecond = mt_rand(1, 10); // Adjust the range as needed manually

        // Calculate duration per second
        $durationPerSecond = $duration / $stepPerSecond;

        return [
            'course_id'      => $courseId,
            'duration'       => $duration,
            'position'       => mt_rand(0, 60),
            'vout'           => mt_rand(0, 300),
            'dorsimax'       => number_format(mt_rand(0, 100), 2),
            'plantarmax'     => number_format(mt_rand(0, 100), 2),
            'rom'            => number_format(mt_rand(0, 100), 2),
            'percentage'     => number_format(mt_rand(0, 100), 2),
            'step_amount'    => mt_rand(0, 100),
            'step_duration'  => $durationPerSecond,
            'step_per_second' => $stepPerSecond,
            'created_at'     => now()->subMonth(),
            'updated_at'     => now()->subMonth(),
        ];
    }
}