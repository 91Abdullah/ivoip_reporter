<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cdr;
use App\ReadyNotReady;
use App\ConsolidatedReport1;
use App\ConsolidatedReport2;
use Carbon\Carbon;
use App\QueueLog;

class ReportController extends Controller
{
    public function getCdr(Request $request)
    {
        if($request->isMethod('post')) {
            $range = explode("-", $request->daterange);
            $range_from = Carbon::parse(trim($range[0]));
            $range_to = Carbon::parse(trim($range[1]));

            $cdrs = Cdr::whereBetween('start', [$range_from, $range_to])->latest('start')->get();
            return view('_cdr', compact('cdrs')) ;
        } else {
            return view('cdr');
        }
    }

    public function getReadyReport(Request $request)
    {
        if($request->isMethod('post')) {
            $range = explode("-", $request->daterange);
            $range_from = Carbon::parse(trim($range[0]));
            $range_to = Carbon::parse(trim($range[1]));

            switch ($request->type) {
                case 'both':
                    $reports = ReadyNotReady::whereBetween('datetime', [$range_from, $range_to])->latest('datetime')->get();
                    break;
                case 'ready':
                    $reports = ReadyNotReady::where('State', ucfirst($request->type))->whereBetween('datetime', [$range_from, $range_to])->latest('datetime')->get();
                    break;
                case 'not_ready':
                    $reports = ReadyNotReady::where('State', ucfirst($request->type))->whereBetween('datetime', [$range_from, $range_to])->latest('datetime')->get();
                    break;
                default:
                    abort(404);
                    break;
            }
            // return dd($reports);
            return view('_ready', compact('reports'));
        } else {
            return view('ready');
        }
    }

    public function getConsolidatedReport_1(Request $request)
    {
        if($request->isMethod('post')) {
            $range = explode("-", $request->daterange);
            $range_from = Carbon::parse(trim($range[0]));
            $range_to = Carbon::parse(trim($range[1]));

            $reports = ConsolidatedReport1::whereBetween('LoginTime', [$range_from, $range_to])->latest('LoginTime')->get();
            return view('_consolidated_1', compact('reports'));
        } else {
            return view('consolidated_1');
        }
    }

    public function getConsolidatedReport_2(Request $request)
    {
        if($request->isMethod('post')) {
            $range = explode("-", $request->daterange);
            $range_from = Carbon::parse(trim($range[0]));
            $range_to = Carbon::parse(trim($range[1]));

            $reports = ConsolidatedReport2::whereBetween('LoginTime', [$range_from, $range_to])->latest('LoginTime')->get();
            return view('_consolidated_2', compact('reports'));
        } else {
            return view('consolidated_2');
        }
    }

    public function getAbondanedReport(Request $request)
    {
        if($request->isMethod('post')) {
            $range = explode("-", $request->daterange);
            $range_from = Carbon::parse(trim($range[0]));
            $range_to = Carbon::parse(trim($range[1]));

            $reports = QueueLog::where('event', 'ABANDON')->whereBetween('time', [$range_from, $range_to])->latest('time')->get();
            return view('_abondaned', compact('reports'));
        } else {
            return view('abondaned');
        }
    }

    public function getEnterqueueReport(Request $request)
    {
        if($request->isMethod('post')) {
            $range = explode("-", $request->daterange);
            $range_from = Carbon::parse(trim($range[0]));
            $range_to = Carbon::parse(trim($range[1]));

            $reports = QueueLog::where('event', 'ENTERQUEUE')->whereBetween('time', [$range_from, $range_to])->latest('time')->get();
            return view('_enterqueue', compact('reports'));
        } else {
            return view('enterqueue');
        }
    }

    public function getAgentconnectReport(Request $request)
    {
        if($request->isMethod('post')) {
            $range = explode("-", $request->daterange);
            $range_from = Carbon::parse(trim($range[0]));
            $range_to = Carbon::parse(trim($range[1]));

            $reports = QueueLog::where('event', 'CONNECT')->whereBetween('time', [$range_from, $range_to])->latest('time')->get();
            return view('_agentconnect', compact('reports'));
        } else {
            return view('agentconnect');
        }
    }
}
