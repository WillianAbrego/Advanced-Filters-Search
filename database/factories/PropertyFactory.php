<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'price' => rand(1000000, 5000000),
            'rooms' => rand(1, 10),
            'bathrooms' => rand(1, 10),
            'user_id' => User::factory(),

        ];
    }
}
