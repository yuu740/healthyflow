<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FastingLog>
 */
class FastingLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = fake()->dateTimeBetween('-7 days', '-1 days');
        $end = (clone $start)->modify('+' . fake()->numberBetween(12, 18) . ' hours');

        return [
            'start_time' => $start,
            'end_time' => $end,
            'target_duration_hours' => 16,
        ];
    }
}
