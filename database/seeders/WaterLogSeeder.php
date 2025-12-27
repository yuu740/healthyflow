<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\WaterLog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WaterLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'test@example.com')->first();

        if ($user) {
            WaterLog::factory(20)->create(['user_id' => $user->id]);
        }
    }
}
