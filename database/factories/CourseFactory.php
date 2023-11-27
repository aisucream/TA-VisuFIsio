<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $mobileUserIds = User::where('type', 'mobile')->pluck('id')->toArray();

        return [
            'code' => 'REBOT-' . str_pad($this->faker->unique()->numberBetween(1, 30), 3, '0', STR_PAD_LEFT),
            'user_id' => $this->faker->randomElement($mobileUserIds),
            'start_time' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'end_time' => $this->faker->dateTimeBetween('now', '+1 month'),
            'created_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}