<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Support\Facades\Cache;

class ProjectObserver
{
    /**
     * Handle the Project "created" event.
     */
    public function created(Project $project): void
    {
        Cache::forget("sidebar_projects");
        Cache::forget("projects_phases_tasks");
    }

    /**
     * Handle the Project "updated" event.
     */
    public function updated(Project $project): void
    {
        Cache::forget("sidebar_projects");
        Cache::forget("projects_phases_tasks");
    }

    /**
     * Handle the Project "deleted" event.
     */
    public function deleted(Project $project): void
    {
        Cache::forget("sidebar_projects");
        Cache::forget("projects_phases_tasks");
    }

    /**
     * Handle the Project "restored" event.
     */
    public function restored(Project $project): void
    {
        //
    }

    /**
     * Handle the Project "force deleted" event.
     */
    public function forceDeleted(Project $project): void
    {
        //
    }
}
