<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessagePosted implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(
        public string $user,
        public string $message
    ) {}

    // Public channel "messages"
    public function broadcastOn(): Channel
    {
        return new Channel('messages');
    }

    // Alias used on the client with a leading dot
    public function broadcastAs(): string
    {
        return 'newMessage';
    }

    // Payload sent to the client
    public function broadcastWith(): array
    {
        return [
            'user'    => $this->user,
            'message' => $this->message,
        ];
    }
}
