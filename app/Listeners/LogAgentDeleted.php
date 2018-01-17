<?php

namespace App\Listeners;

use App\CurrentStateInfo;
use App\Events\AgentDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogAgentDeleted
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
     * @param  AgentDeleted  $event
     * @return void
     */
    public function handle(AgentDeleted $event)
    {
        $agentInfo = CurrentStateInfo::where("Extension", $event->agent->Extension)->get();
        $agentInfo->first()->delete();
    }
}
