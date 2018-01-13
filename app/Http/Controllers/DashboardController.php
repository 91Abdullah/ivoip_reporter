<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PAMI\Client\Impl\ClientImpl;
use PAMI\Message\Action\QueueStatusAction;
use PAMI\Message\Action\QueueSummaryAction;
use PAMI\Message\Action\QueueRemoveAction;
use PAMI\Listener\IEventListener;
use PAMI\Message\Event\EventMessage;

class DashboardController extends Controller
{

    public function index()
    {
    	return view('dashboard');
    }

    public function getData()
    {
    	$options = [
			'host' => '192.168.8.210',
			'scheme' => 'tcp://',
			'port' => 5038,
			'username' => 'ivoip-dashboard',
			'secret' => 'Root12',
			'connect_timeout' => 10,
			'read_timeout' => 10
		];
    	$client = new ClientImpl($options);
    	$client->open();
    	$response_params = $client->send(new QueueStatusAction('100'));
    	$response_summary = $client->send(new QueueSummaryAction('100'));
    	$client->close();
    	return response()->json([
    		'QueueParams' => $response_params->getEvents()[0]->getKeys(),
    		'QueueSummary' => $response_summary->getEvents()[0]->getKeys()
    	]);
    }


}