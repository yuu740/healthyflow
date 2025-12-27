<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WaterLog>
 */
class WaterLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'amount_ml' => fake()->randomElement([250, 330, 500, 600]),
            'logged_at' => fake()->dateTimeBetween('-7 days', 'now'),
        ];
    }
}
