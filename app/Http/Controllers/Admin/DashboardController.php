<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function index(): Response {
        return Inertia::render("Dashboard", [
            "sidebarProjects" => Project::with("phases")->get()
        ]);
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
