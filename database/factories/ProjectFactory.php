<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
//          name should be prefixed with Project name and a random number
            "name" => "Project " . fake()->numberBetween(1, 100) . " " . fake()->word(),
            "description" => fake()->paragraph(),
            "color" => fake()->hexColor(),
            "timeline" => fake()->dateTimeBetween("now", "+1 year"),
            "budget" => fake()->numberBetween(1000, 100000),
            "resource_allocation" => fake()->numberBetween(1, 100),
        ];
    }
}
