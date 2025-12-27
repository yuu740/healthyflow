<?php

namespace Database\Seeders;

use App\Models\FoodDiary;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FoodDiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'test@example.com')->first();

        if ($user) {
            FoodDiary::factory(5)->create(['user_id' => $user->id]);
        }
    }
}
