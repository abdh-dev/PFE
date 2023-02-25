<?php

namespace App\Http\Controllers\Admin;

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
            "projects" => Project::all()
        ]);
    }

    public function store(ProjectRequest $request): RedirectResponse {
        $request->user()->projects()->create($request->validated());

        return back();
    }

    public function show($id): Response {
        return Inertia::render("Project/Show", [
            "project" => Project::with('tasks')->findOrFail($id)
        ]);
    }

    public function destroy($id): RedirectResponse {
        Project::findOrFail($id)->delete();

        return back();
    }
}
