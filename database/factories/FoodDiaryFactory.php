<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoodDiary>
 */
class FoodDiaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'food_name' => fake()->randomElement(['Nasi Goreng', 'Salad Ayam', 'Oatmeal', 'Soto Ayam', 'Roti Bakar']),
            'image_path' => 'placeholders/food.jpg', // Nanti kita siapkan gambarnya
            'notes' => fake()->sentence(),
            'logged_at' => fake()->dateTimeBetween('-7 days', 'now'),
        ];
    }
}
