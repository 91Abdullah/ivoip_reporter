<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AsteriskTable;

class SettingController extends Controller
{
    public function index()
    {
    	$setting = AsteriskTable::first();
    	return view('settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
    	$this->validate($request, [
    		'ProxyIP' => 'required|ipv4',
    		'Port' => 'required|integer',
    		'ManagerUsername' => 'required',
    		'ManagerPassword' => 'required',
    		'ManagerPort' => 'required|integer',
    		'Queue' => 'required'
    	]);

    	$setting = AsteriskTable::first();
    	$setting->update($request->all());

    	return redirect()->back();
    }
}
