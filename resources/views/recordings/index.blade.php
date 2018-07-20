@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/plug-ins/1.10.15/integration/font-awesome/dataTables.fontAwesome.css">
@endpush

@section('content')
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-body">    
            <h1>Call Recordings</h1>
            <p>Allows to listen and download call recordings.</p>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-body">
            {!! Form::open(['route' => 'get.recordings', 'method' => 'POST']) !!}
            <div class="form-group">
                {!! Form::label('daterange', 'Select Date Range') !!}
                <div class="input-group">
                    {!! Form::text('daterange', null, ['class' => 'form-control']) !!}
                    <span class="input-group-addon">
                        <i class="fa fa-calendar"></i>&nbsp;
                    </span>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('status', 'Select Status') !!}
                {!! Form::select('status', ['ALL', 'ANSWERED', 'BUSY', 'NO ANSWER', 'FAILED'], null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-12">
                        {!! Form::label('field', 'Select Field') !!}
                    </div>
                    <div class="col-md-4">
                        {!! Form::select('field_name', ['src' => 'Source', 'dst' => 'Destination'], null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-8">
                        {!! Form::text('field_pattern', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('limit', 'Limit records to') !!}
                {!! Form::text('limit', '100', ['class' => 'form-control']) !!}
            </div>
            <br>
            {!! Form::submit('Submit', ['class' => 'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
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