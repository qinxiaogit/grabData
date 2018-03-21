<?php

namespace App\Listeners;

use App\Events\ElkLogEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

/**
 * Class ElkLogEventListener
 * @package App\Listeners
 * 日志事件监听器
 */
class ElkLogEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ElkLogEvent  $event
     * @return void
     */
    public function handle(ElkLogEvent $event)
    {
        //
        $event->addLog();
    }
}
