<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskRequest;
use App\Models\Phase;
use App\Models\Task;
use Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TaskController extends Controller {
    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request): RedirectResponse {
        $phase = Phase::findOrFail($request->phase_id);
        $phase->tasks()->create($request->validated());

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): RedirectResponse {
        $task->delete();

        return back();
    }
}
