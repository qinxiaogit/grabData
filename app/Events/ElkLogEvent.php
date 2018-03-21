<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use APP\Model\Log;
/**
 * Class ElkLogEvent
 * @package App\Events
 * 日志监听器
 */
class ElkLogEvent
{
    use InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     * @param  $log 日志对象
     * @return void
     */
    protected $log = null;
    public function __construct(Log $log)
    {
        $this->log = $log;
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    public function addLog(){
        \Debugbar::info($this->log->addToIndex());
    }
}
