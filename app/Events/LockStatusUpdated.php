<?php

namespace App\Events;

use App\Lock;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LockStatusUpdated  implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    const SEND_STATUSES = [0, 1];
    /**
     * @var Lock
     */
    public $update;


    /**
     * LockStatusUpdated constructor.
     * @param Lock $lock
     */
    public function __construct(Lock $lock)
    {
        $this->update=$lock;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel($this->update->channel);
    }

    public function broadcastWith()
    {
        return ['status' => $this->update->status];
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'my-event';
    }

    /**
     * Determine if this event should broadcast.
     *
     * @return bool
     */
    public function broadcastWhen()
    {
        return in_array($this->update->status, self::SEND_STATUSES);
    }
}
