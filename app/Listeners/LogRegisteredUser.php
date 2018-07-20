<?php

namespace App\Listeners;

use App\CurrentStateInfo;
use App\AgentSettings;
use App\Events\AgentCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use GuzzleHttp\Client;
use App\AsteriskTable;
use PAMI\Client\Impl\ClientImpl;
use PAMI\Message\Action\DBPutAction;

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

        $settings = AgentSettings::create([
            'name' => $event->agent->Name,
            'extension' => $event->agent->Extension
        ]);

        $ast_settings = AsteriskTable::first();

        // Create agent on elastix 

        $cmd = "addextension";
        $name = $event->agent->Name;
        $deny = "0.0.0.0/0.0.0.0";
        $secret = $event->agent->Secret;
        $dtmfmode = "rfc2833";
        $canreinvite = "no";
        $context = "from-internal";
        $host = "dynamic";
        $trustrpid = "yes";
        $sendrpid = "no";
        $type = "friend";
        $nat = "no";
        $port = "5060";
        $qualify = "yes";
        $qualifyfreq = "60";
        $transport = "udp";
        $avpf = "no";
        $icesupport = "no";
        $encryption = "no";
        $callgroup = "";
        $pickupgroup = "";
        $dial = "SIP/" . $event->agent->Extension;
        $mailbox = $event->agent->Extension . "@device";
        $permit = "0.0.0.0/0.0.0.0";
        $callerid = $event->agent->Name . "<" . $event->agent->Extension . ">";
        $callcounter = "yes";
        $faxdetect = "no";
        $account = $event->agent->Extension;

        $client = new Client;

        $params = "cmd=$cmd&name=$name&deny=$deny&secret=$secret&dtmfmode=$dtmfmode&canreinvite=$canreinvite&context=$context&host=$host&trustrpid=$trustrpid&sendrpid=$sendrpid&type=$type&nat=$nat&port=$port&qualify=$qualify&qualifyfreq=$qualifyfreq&transport=$transport&avpf=$avpf&icesupport=$icesupport&encryption=$encryption&callgroup=$callgroup&pickupgroup=$pickupgroup&dial=$dial&mailbox=$mailbox&permit=$permit&callerid=$callerid&callcounter=$callcounter&faxdetect=$faxdetect&account=$account";
        $response = $client->request('GET', "http://$ast_settings->ProxyIP/elastix-api/api.php?" . $params, [
            'auth' => ['abdullah', 'abdullah'],
            'verify' => false
        ]); 

        // Enable Call Recording -- external

        if($response->getStatusCode() == 200) {
            $options = [
                'host' => $ast_settings->ProxyIP,
                'scheme' => 'tcp://',
                'port' => $ast_settings->ManagerPort,
                'username' => $ast_settings->ManagerUsername,
                'secret' => $ast_settings->ManagerPassword,
                'connect_timeout' => 20,
                'read_timeout' => 100
            ];

            $client = new ClientImpl($options);
            $client->open();

            $client->send(new DBPutAction('AMPUSER', $event->agent->Extension.'/recording/in/external', 'always'));
            $client->send(new DBPutAction('AMPUSER', $event->agent->Extension.'/recording/out/external', 'always'));

            $client->close();
        } 

        //return dd($info);
    }
}
