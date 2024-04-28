<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\post;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class postFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(0, 2),
            'title' => $this->faker->title(),
            'content' => $this->faker->paragraph(),
            'postCategory' => $this->faker->numberBetween(11, 35), 
            'typeBCategory' => $this->faker->numberBetween(11, 20),
            'toWhomCategory' => $this->faker->numberBetween(11, 23), 
        ];
    }
}