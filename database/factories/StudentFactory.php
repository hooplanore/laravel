<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $tel = str_replace('-','',$this->faker->phoneNumber);

        return [
            'name' => $this->faker->name,
            'kana' => $this->faker->kanaName,
            'email' => $this->faker->email,
            'password' => $this->faker->password,
            'zip_code' => $this->faker->postcode,
            'address1' => $this->faker->city,
            'address2' => $this->faker->streetAddress,
            'tel' => $tel,
            'gender' => $this->faker->numberBetween(0, 2),
            'birthday' => $this->faker->date,
            'joindate' => $this->faker->date,
            'amount_category' => $this->faker->numberBetween(0, 2),
            'payment' => $this->faker->numberBetween(0, 2),
            'introducer' => $this->faker->name,
            'parent_name' => $this->faker->name,
            'campaign' => $this->faker->text,
            'memo' => $this->faker->realText(50),
            'status' => $this->faker->numberBetween(0, 2),
        ];
    }
}
