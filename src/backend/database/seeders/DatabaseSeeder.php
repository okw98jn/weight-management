<?php

namespace Database\Seeders;

use App\Models\GoalSetting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->has(GoalSetting::factory()->count(3))->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
