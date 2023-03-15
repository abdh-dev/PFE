<?php

namespace App\Events\Phase;

use App\Models\Phase;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PhaseCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public function __construct(
        public Phase $phase
    ) {}

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|PrivateChannel|array
     */
    public function broadcastOn(): Channel | PrivateChannel | array {
        return new PrivateChannel("private.projects.{$this->phase->project_id}.phases");
    }

    public function broadcastAs(): string {
        return "phase.created";
    }

    public function broadcastWith(): array {
        return [
            "phase" => $this->phase,
        ];
    }
}
