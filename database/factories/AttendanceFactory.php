<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\Group;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $group_id = Group::all()->random(1)[0]->id;
        return [
            'group_id' => $group_id,
            'attendancedate' => $this->faker->dateTime,
            'attendance_count' => $this->faker->numberBetween(0, 7),
            'belongs_count' => $this->faker->numberBetween(0, 7),
            'ap_count' => $this->faker->numberBetween(0, 7),
            'stamp_count' => $this->faker->numberBetween(0, 7),
        ];
    }
}
