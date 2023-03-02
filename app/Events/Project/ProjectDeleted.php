<?php

namespace App\Events\Project;

use App\Models\Project;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ProjectDeleted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(
        public Project $project
    ) {}

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel | PrivateChannel | array
     */
    public function broadcastOn(): Channel | PrivateChannel | array {
        return new Channel('public.projects');
    }

    public function broadcastAs(): string {
        return "project.deleted";
    }

    public function broadcastWith(): array {
        return [
            "project" => $this->project,
        ];
    }
}
