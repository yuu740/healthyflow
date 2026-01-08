<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TimePresetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::first();
        if($user) {
            \App\Models\TimerPreset::create(['user_id' => $user->id, 'name' => 'Fasting', 'duration_minutes' => 0, 'icon' => 'hourglass-split']);
            \App\Models\TimerPreset::create(['user_id' => $user->id, 'name' => 'Pomodoro', 'duration_minutes' => 25, 'icon' => 'brain']);
            \App\Models\TimerPreset::create(['user_id' => $user->id, 'name' => 'Nap', 'duration_minutes' => 20, 'icon' => 'moon-stars']);
        }
    }
}
