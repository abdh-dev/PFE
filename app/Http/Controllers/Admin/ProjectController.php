<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;

class ProjectController extends Controller {
    public function store(ProjectRequest $request): RedirectResponse {
        $request->user()->projects()->create($request->validated());

        return back();
    }

    public function update(ProjectRequest $request, Project $project): RedirectResponse {
        $project->update($request->validated());

        return back();
    }

    public function destroy(Project $project): RedirectResponse {
        $project->delete();

        return back();
    }
}
