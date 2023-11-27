<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\CourseDetail;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CourseDetailFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CourseDetail::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    protected static $lastDuration = 0;
    protected static $lastPosition = 0;
    protected static $lastStepDuration = 1; // Mulai dari 1 atau nilai awal yang diinginkan

    public function definition()
    {
        $courseId = Course::inRandomOrder()->first()->id;

        static::$lastDuration += $this->faker->randomFloat(2, 1, 10);

        // Menambahkan nilai position dari nilai terakhir
        static::$lastPosition += $this->faker->randomFloat(2, 0, 100);

        // Menambahkan nilai step_duration dari nilai terakhir
        static::$lastStepDuration += $this->faker->randomFloat(2, 1, 10);

        return [
            'course_id'      => $courseId,
            'duration'       => number_format(static::$lastDuration, 2), // Format menit
            'position'       => intval(static::$lastPosition), // Format jumlah steps (bilangan bulat)
            'vout'           => intval($this->faker->randomFloat(2, 0, 100)), // Format bilangan bulat
            'dorsimax'       => number_format($this->faker->randomFloat(2, 0, 100), 2), // Format derajat
            'plantarmax'     => number_format($this->faker->randomFloat(2, 0, 100), 2), // Format derajat
            'rom'            => number_format($this->faker->randomFloat(2, 0, 100), 2), // Format derajat
            'percentage'     => number_format($this->faker->randomFloat(2, 0, 100), 2) , // Format persen
            'step_amount'    => intval($this->faker->randomFloat(2, 0, 100)), // Format banyak steps (bilangan bulat)
            'step_duration'  => number_format(static::$lastStepDuration, 2), // Format detik
            'step_per_second' => number_format($this->faker->randomFloat(2, 0, 10), 2), // Format banyak steps (bilangan bulat)
            'created_at'     => $this->faker->dateTimeBetween('-1 month', 'now'),
            'updated_at'     => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}