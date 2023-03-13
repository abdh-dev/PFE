<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function index(): Response {
        return Inertia::render("Dashboard", [
            "sidebarProjects" => Project::with("phases")->get()
        ]);
    }

//    public function store(ProjectRequest $request): RedirectResponse {
//        $project = $request->user()->projects()->create($request->validated());
//
//        //        ProjectCreated::dispatch($project);D
//        broadcast(new ProjectCreated($project))->toOthers();
//
//        return back();
//    }
//
//    public function update(ProjectRequest $request, Project $project): RedirectResponse {
//        //        dd($project);
//        $project->update($request->validated());
//
//        broadcast(new ProjectUpdated($project));
//
//        return back();
//    }
//
//    public function show($id): \Inertia\Response {
//        return Inertia::render("Project/Show", [
//            "project" => Project::with('tasks')->findOrFail($id)
//        ]);
//    }
//
//    public function destroy($id): RedirectResponse {
//        $project = Project::findOrFail($id);
//
//        broadcast(new ProjectDeleted($project))->toOthers();
//        $project->delete();
//
//        return back();
//    }
}
