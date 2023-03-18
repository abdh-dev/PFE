<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function index(): Response {
//        Cache::flush();

        // this will be change later since it's not efficient at all
        $sidebarProjects = Cache::rememberForever("sidebar_projects", function () {
            return Project::with(["phases" => function ($query) {
                $query->withCount("tasks");
            }])->get();
        });

        $projects = Cache::rememberForever("projects", function () {
            return Project::with(["phases" => function ($query) {
                $query->with("tasks");
            }])->get();
        });

        return Inertia::render("Dashboard", [
            "sidebarProjects" => $sidebarProjects,
            "projects" => $projects
        ]);
    }

    public function showProject(Project $project): void {
//        $project->dd();
        dd($project);
    }

    public function store(Request $request) {

    }

    public function update(Request $request, Project $project) {

    }

    public function show($id) {

    }

    public function destroy($id) {

    }
}
