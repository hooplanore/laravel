<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Group>
 */
class GroupFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'group_category' => $this->faker->numberBetween(0, 7),
            'name' => $this->faker->city,
            'groupdate' => $this->faker->dayOfWeek,
            'grouptime' => $this->faker->amPm,
            'placename' => $this->faker->locale,
            'address' => $this->faker->streetAddress,
            'status' => $this->faker->numberBetween(0, 2),
        ];
    }
}
