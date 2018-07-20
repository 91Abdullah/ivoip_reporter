<?php

namespace App\Listeners;

use App\CurrentStateInfo;
use App\AgentSettings;
use App\Events\AgentDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use PAMI\Client\Impl\ClientImpl;
use PAMI\Message\Action\DBDelAction;
use GuzzleHttp\Client;
use App\AsteriskTable;

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
        $settings = AgentSettings::where("extension", $event->agent->Extension)->get();
        $agentInfo->first()->delete();
        $settings->first()->delete();

        $ast_settings = AsteriskTable::first();

        $client = new Client;
        $cmd = "deleteextension";

        $params = "cmd=$cmd&account=$event->agent->Extension";
        $response = $client->request('GET', "http://$ast_settings->ProxyIP/elastix-api/api.php?" . $params, [
            'auth' => ['abdullah', 'abdullah'],
            'verify' => false
        ]); 

        if($response->getStatusCode() == 200) {
            $options = [
                'host' => $ast_settings->ProxyIP,
                'scheme' => 'tcp://',
                'port' => $ast_settings->ManagerPort,
                'username' => $ast_settings->ManagerUsername,
                'secret' => $ast_settings->ManagerPassword,
                'connect_timeout' => 20,
                'read_timeout' => 20
            ];
            $client = new ClientImpl($options);
            $client->open();

            $client->send(new DBDelAction('AMPUSER', $event->agent->Extension.'/recording/in/external', 'always'));
            $client->send(new DBDelAction('AMPUSER', $event->agent->Extension.'/recording/out/external', 'always'));

            $client->close();
        }
    }
}
