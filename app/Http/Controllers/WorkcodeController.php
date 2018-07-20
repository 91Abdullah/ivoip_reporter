<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Workcode;

class WorkcodeController extends Controller
{
    public function index()
    {
    	$workcodes = Workcode::all();
    	return view('workcodes.index', compact('workcodes'));
    }

    public function create(Request $request)
    {
    	if($request->isMethod('post')) {
    		$this->validate($request, [
    			'WORKCODE' => 'required|string'
    		]);
    		$workcode = Workcode::create($request->all());
    		return redirect()->route('workcodes');
    	} else {
    		return view('workcodes.create');
    	}
    }

    public function update(Request $request, Workcode $workcode)
    {
    	if($request->isMethod('patch')) {
    		$this->validate($request, [
    			'WORKCODE' => 'required|string'
    		]);
    		$workcode->update($request->all());
    		return redirect()->route('workcodes');
    	} else {
    		return view('workcodes.update', compact('workcode'));
    	}
    }

    public function delete(Workcode $workcode)
    {
    	$workcode->delete();
    	return redirect()->route('workcodes');
    }
}
