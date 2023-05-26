<?php

namespace Database\Factories;

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
            "title" => $this->faker->sentence(3),
            "description" => $this->faker->paragraph(3),
            "status" => $this->faker->numberBetween(0, 2),
            "priority" => $this->faker->numberBetween(0, 2),
            "estimated_time" => $this->faker->randomFloat(2, 0, 100),
            "bonus" => $this->faker->numberBetween(0, 100),
            "penalty" => $this->faker->numberBetween(0, 100),
            "start_date" => $this->faker->date(),
            "due_date" => $this->faker->dateTimeBetween('-2 weeks', '+2 weeks'),
            "completion_date" => $this->faker->date(),
            "custom_fields" => $this->faker->paragraph(3),
            "created_by" => $this->faker->numberBetween(1, 10),
        ];
    }
}
