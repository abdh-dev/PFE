<?php

namespace App\Http\Controllers\Admin;

use App\Events\Project\ProjectCreated;
use App\Events\Project\ProjectDeleted;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ProjectController extends Controller
{
    public function index(): Response {
        return Inertia::render("Project/Add", [
            "projects" => Project::latest()->take(5)->get()
//            "projects" => Project::all()
        ]);
    }

    public function store(ProjectRequest $request): RedirectResponse {
        $project = $request->user()->projects()->create($request->validated());

//        ProjectCreated::dispatch($project);D
        broadcast(new ProjectCreated($project))->toOthers();

        return back();
    }

    public function show($id): Response {
        return Inertia::render("Project/Show", [
            "project" => Project::with('tasks')->findOrFail($id)
        ]);
    }

    public function destroy($id): RedirectResponse {
        $project = Project::findOrFail($id);

        broadcast(new ProjectDeleted($project))->toOthers();
        $project->delete();

        return back();
    }
}
