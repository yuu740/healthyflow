<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ActivityLog>
 */
class ActivityLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'activity_name' => fake()->randomElement(['Lari Pagi', 'Yoga', 'Angkat Beban', 'Sepeda Statis', 'Berenang']),
            'duration_minutes' => fake()->numberBetween(15, 90),
            'logged_at' => fake()->dateTimeBetween('-7 days', 'now'),
        ];
    }
}
