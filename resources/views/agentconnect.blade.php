@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/1.10.15/integration/font-awesome/dataTables.fontAwesome.css">
@endpush

@section('content')
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Agent Connect Report</h1>
            <p>
                The caller was connected to an agent. Hold time represents the amount of time the caller was on hold. Ringtime represents the time the queue members phone was ringing prior to being answered.
            </p>
        </div>

        <div class="panel-body">
            {!! Form::open(['route' => 'fetch_agentconnect_report', 'method' => 'POST']) !!}
            <div class="form-group">
                {!! Form::label('daterange', 'Select Date Range') !!}
                <div class="input-group">
                    {!! Form::text('daterange', null, ['class' => 'form-control']) !!}
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>&nbsp;
                    </span>
                </div>
            </div>
            <br>
            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>

        {{--  <div class="panel-footer text-center">
            {!! $cdrs->links() !!}
        </div>  --}}
    </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
    <script>
        var start = moment().subtract(29, 'days');
        var end = moment();

        $('#daterange').daterangepicker({
            startDate: start,
            endDate: end,
            ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        });
    </script>
@endpush