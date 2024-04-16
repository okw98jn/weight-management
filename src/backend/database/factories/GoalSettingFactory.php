<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GoalSetting>
 */
class GoalSettingFactory extends Factory
{
    /**
     * Define the model's default state
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'start_weight' => fake()->randomFloat(1, 60.0, 70.0),
            'goal_weight' => fake()->randomFloat(1, 50.0, 59.9),
            'is_current_goal' => false,
        ];
    }
}
