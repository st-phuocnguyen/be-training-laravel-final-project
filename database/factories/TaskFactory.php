<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => Str::random(),
            'description' => fake()->text(),
            'type' => rand(0, 3),
            'status' => rand(0, 1),
            'start_date' => now(),
            'due_date' => now(),
            'assignee' => User::all()->random()->uuid,
            'estimate' => fake()->randomFloat(),
            'actual' => fake()->randomFloat(),
        ];
    }
}
