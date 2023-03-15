<?php

namespace App\Http\Controllers\Admin;

use App\Events\Phase\PhaseCreated;
use App\Http\Controllers\Controller;
use App\Http\Requests\PhaseRequest;
use App\Models\Phase;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PhaseController extends Controller
{
    public function store(PhaseRequest $request, Project $project): RedirectResponse {
        $project->phases()->create($request->validated());

        return back();
    }

    public function update(PhaseRequest $request, Project $project, Phase $phase): RedirectResponse {
        $phase->update($request->validated());

        return back();
    }

    public function destroy(Phase $phase): RedirectResponse {
        $phase->delete();

        return back();
    }
}
