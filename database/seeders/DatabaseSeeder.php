<?php

namespace Database\Seeders;

use App\Models\Phase;
use App\Models\Project;
use App\Models\Task;
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
        $this->call([
            UserSeeder::class,
        ]);

        Project::factory()
            ->count(1)
            ->for((new User)->first())
            ->create()
            ->each(function (Project $project) {
                $project->phases()->saveMany(
                    Phase::factory(1)->make()
                )->each(function (Phase $phase) {
                    $phase->tasks()->saveMany(
                        Task::factory(3)->make()
                    );
                });
            });
    }
}
