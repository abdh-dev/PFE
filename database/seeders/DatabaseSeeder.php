<?php

namespace Database\Seeders;

use App\Models\Phase;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void {
        User::factory()->create([
            "username" => "Abd",
            "email" => "test@example.com"
        ]);

        User::factory(10)->create();

        Project::factory()
            ->count(10)
            ->for((new User)->first())
            ->create()
            ->each(function (Project $project) {
                $project->phases()->saveMany(
                    Phase::factory(5)->make()
                );
            });
    }
}
