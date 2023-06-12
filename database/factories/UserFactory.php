<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $tel = str_replace('-','',$this->faker->phoneNumber);//電話番号フォーマット

        return [
            'name' => fake()->name(),
            'kana' => $this->faker->kanaName,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => 'password123', // password
            'remember_token' => Str::random(10),
            'zip_code' => $this->faker->postcode,
            'address1' => $this->faker->city,
            'address2' => $this->faker->streetAddress,
            'tel' => $tel,
            'gender' => $this->faker->numberBetween(0, 2),
            'birthday' => $this->faker->date,
            'status' => $this->faker->numberBetween(0, 2),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
