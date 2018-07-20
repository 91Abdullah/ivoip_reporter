<?php

namespace App\Http\Controllers;

use App\Agent;
use App\Events\AgentCreated;
use App\Events\AgentDeleted;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index()
    {
    	$agents = Agent::all();
    	return view('agents.index', compact('agents'));
    }

    public function create(Request $request)
    {
    	if($request->isMethod('post')) {

    		$this->validate($request, [
    			'Name' => 'required',
    			'Extension' => 'required|numeric',
    			'Secret' => 'required',
    			'SystemType' => 'required',
    			'SystemRights' => 'required',
                'Queue' => 'required'
    		]);

    		$agent = Agent::create($request->all());
            event(new AgentCreated($agent));

    		return redirect()->route('agents');
    	} else {
    		return view('agents.create');
    	}
    }

    public function delete(Agent $agent)
    {
        event(new AgentDeleted($agent));
        
    	$agent->delete();

    	session()->flash('success', 'Agent has been deleted.');

    	return redirect()->route('agents');
    }

    public function update(Request $request, Agent $agent)
    {
    	if($request->isMethod('patch')) {
    		$this->validate($request, [
    			'Name' => 'required',
    			'Extension' => 'required|numeric',
    			'Secret' => 'required',
    			'SystemType' => 'required',
    			'SystemRights' => 'required'
    		]);

    		$agent->update($request->all());

    		session()->flash('success', 'Agent has been updated.');

    		return redirect()->route('agents');
    	} else {
    		return view('agents.edit', compact('agent'));
    	}
    }
}
