<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Mahasiswa Test',
                'email' => 'test@example.com',
                'password' => bcrypt('password'),
                'preferred_unit' => 'ml', 
                'preferred_locale' => 'id',
            ]);
        }
    }
}
