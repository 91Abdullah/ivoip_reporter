@extends('layouts.app')

@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Welcome!</h1>
        </div>

        <div class="panel-body">
            <p>Welcome to iVoIP Reporter version 2.0.0 (Web)</p>
            <p>Following reports are available:</p>
            <ul>
                <li>Call Detail Records</li>
                <li>Ready / Not Ready report</li>
                <li>Consolidated Report - 1</li>
                <li>Consolidated Report - 2</li>
                <li>Abandoned Calls Report</li>
                <li>Enter Queue Report</li>
                <li>Agent Connect Report</li>
            </ul>
        </div>
    </div>
</div>
@endsection
