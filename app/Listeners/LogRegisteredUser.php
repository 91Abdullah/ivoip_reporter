<?php

namespace App\Listeners;

use App\CurrentStateInfo;
use App\Events\AgentCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogRegisteredUser
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
     * @param  Registered  $event
     * @return void
     */
    public function handle(AgentCreated $event)
    {
        $info = CurrentStateInfo::create([
            'Name' => $event->agent->Name,
            'Extension' => $event->agent->Extension
        ]);

        //return dd($info);
    }
}
