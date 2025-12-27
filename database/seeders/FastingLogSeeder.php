<?php

namespace Database\Seeders;

use App\Models\FastingLog;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FastingLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'test@example.com')->first();

        if ($user) {
            FastingLog::factory(5)->create(['user_id' => $user->id]);

            FastingLog::create([
                'user_id' => $user->id,
                'start_time' => now()->subHours(2),
                'end_time' => null,
                'target_duration_hours' => 16,
            ]);
        }
    }
}
