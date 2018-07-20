<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Response;
use App\AsteriskTable;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class RecordingController extends Controller
{
    public function index()
    {
    	// $client = new Client;
    	// $response = $client->request('GET', 'http://$settings->ProxyIP/elastix-api/api.php?cmd=sippeers', [
    	// 	'auth' => ['abdullah', 'abdullah'],
    	// 	'verify' => false
    	// ]);
    	// return dd($response->getBody()->getContents());
    	return view('recordings.index');
    }

    public function getRecordings(Request $request)
    {
    	$settings = AsteriskTable::first();
    	$cmd = "cdrreportwithrecordings";
    	$limit = $request->limit ? $request->limit : "100";
    	$status = $request->status ? $request->status : "ALL";
    	$field_name = $request->field_name ? $request->field_name : "dst";
    	$field_pattern = $request->field_pattern ? $request->field_pattern : "";
    	$custom = "";
    	$start_date = (new Carbon(trim(explode("-", $request->daterange)[0])))->toDateString();
    	$end_date = (new Carbon(trim(explode("-", $request->daterange)[1])))->toDateString();
    	$client = new Client;
    	$params = "cmd=$cmd&start_date=$start_date&end_date=$end_date&field_name=$field_name&field_pattern=$field_pattern&status=$status&custom=$custom&limit=$limit";
    	$response = $client->request('GET', "http://$settings->ProxyIP/elastix-api/api.php?" . $params, [
    		'auth' => ['abdullah', 'abdullah'],
    		'verify' => false
    	]);    	// return dd(json_decode($response->getBody()->getContents()));
    	return view('recordings.show', ['recordings' => json_decode($response->getBody()->getContents())]);
    	// return dd($params);
    	
    }

    public function downloadRecordings(Request $request)
    {	
    	$settings = AsteriskTable::first();
    	$client = new Client;
    	$params = "cmd=getwavfile&name=$request->file";
    	$response = $client->request('GET', "http://$settings->ProxyIP/elastix-api/api.php?" . $params, [
    		'auth' => ['abdullah', 'abdullah'],
    		'verify' => false
    	]);
    	$filename = time() . ".wav";
    	$file = Storage::put("public/$filename", $response->getBody()->getContents());
    	return response()->download(storage_path("app/public/$filename"))->deleteFileAfterSend(true);
    }

    public function streamFile($file)
    {
        $settings = AsteriskTable::first();
    	$client = new Client;
    	$params = "cmd=getwavfile&name=$request->file";
    	$response = $client->request('GET', "http://$settings->ProxyIP/elastix-api/api.php?" . $params, [
    		'auth' => ['abdullah', 'abdullah'],
    		'verify' => false
    	]);
    	return $response->stream(function ($response) {
    		echo $response->getBody()->getContents();
    	}, 200, null);
    }
}
