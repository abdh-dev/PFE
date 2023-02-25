<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectRequest;
use App\Models\Project;
use Inertia\Inertia;
use Inertia\Response;

class ProjectController extends Controller
{
    public function index(): Response {
        return Inertia::render("Project/Add", [
            "projects" => Project::all()
        ]);
    }

    public function store(ProjectRequest $request): Response {
        $request->user()->projects()->create($request->validated());

        return Inertia::render("Project/Add", [
            "projects" => Project::all(),
        ]);
    }

    public function show($id) {
//        return Inertia::render("Project/Show", [
//            "project" => Project::findOrFail($id)
//        ]);
        return [
            "status" => 1,
            "data" => Project::findOrFail($id)
        ];
    }
}
