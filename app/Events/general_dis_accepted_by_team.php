<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class general_dis_accepted_by_team implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */

    public $patient_id;

    public function __construct($patient_id)
    {
        $this->patient_id = $patient_id;
    }

    public function broadcastOn(): array
    {
        return [new Channel('general_dis_team_confirmation_' . $this->patient_id)];
    }
}
