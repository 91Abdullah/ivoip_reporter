<?php

namespace App\Http\Controllers;

use App\AsteriskTable;
use Illuminate\Http\Request;
use PAMI\Client\Impl\ClientImpl;
use PAMI\Listener\IEventListener;
use PAMI\Message\Action\QueueRemoveAction;
use PAMI\Message\Action\QueueStatusAction;
use PAMI\Message\Action\QueueSummaryAction;
use PAMI\Message\Event\EventMessage;

class DashboardController extends Controller
{

    public function index()
    {
    	return view('dashboard');
    }

    public function getData()
    {
    	$settings = AsteriskTable::first();
    	$options = [
			'host' => $settings->ProxyIP,
			'scheme' => 'tcp://',
			'port' => $settings->ManagerPort,
			'username' => $settings->ManagerUsername,
			'secret' => $settings->ManagerPassword,
			'connect_timeout' => 20,
			'read_timeout' => 20
		];
    	$client = new ClientImpl($options);
    	$client->open();
    	$response_params = $client->send(new QueueStatusAction($settings->Queue));
    	$response_summary = $client->send(new QueueSummaryAction($settings->Queue));
    	$client->close();
    	return response()->json([
    		'QueueParams' => $response_params->getEvents()[0]->getKeys(),
    		'QueueSummary' => $response_summary->getEvents()[0]->getKeys()
    	]);
    }


}