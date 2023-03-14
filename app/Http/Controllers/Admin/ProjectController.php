<?php

namespace App\Http\Controllers\Admin;

use App\Events\Project\ProjectCreated;
use App\Events\Project\ProjectDeleted;
use App\Events\Project\ProjectUpdated;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Inertia\Inertia;
use Inertia\Response;

class ProjectController extends Controller
{
    public function store(ProjectRequest $request): RedirectResponse {
        $project = $request->user()->projects()->create($request->validated());
        broadcast(new ProjectCreated($project))->toOthers();

        return back();
    }

    public function update(ProjectRequest $request, Project $project): RedirectResponse {
        $project->update($request->validated());
        broadcast(new ProjectUpdated($project));

        return back();
    }

    public function destroy($id): RedirectResponse {
        $project = Project::findOrFail($id);
        broadcast(new ProjectDeleted($project))->toOthers();
        $project->delete();

        return back();
    }
}
