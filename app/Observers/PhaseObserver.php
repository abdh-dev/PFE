<?php

namespace App\Observers;

use App\Models\Phase;
use Illuminate\Support\Facades\Cache;

class PhaseObserver
{
    /**
     * Handle the Phase "created" event.
     */
    public function created(Phase $phase): void
    {
        Cache::forget("sidebar_projects");
        Cache::forget("projects_phases_tasks");
    }

    /**
     * Handle the Phase "updated" event.
     */
    public function updated(Phase $phase): void
    {
        Cache::forget("sidebar_projects");
        Cache::forget("projects_phases_tasks");
    }

    /**
     * Handle the Phase "deleted" event.
     */
    public function deleted(Phase $phase): void
    {
        Cache::forget("sidebar_projects");
        Cache::forget("projects_phases_tasks");
    }

    /**
     * Handle the Phase "restored" event.
     */
    public function restored(Phase $phase): void
    {
        //
    }

    /**
     * Handle the Phase "force deleted" event.
     */
    public function forceDeleted(Phase $phase): void
    {
        //
    }
}
