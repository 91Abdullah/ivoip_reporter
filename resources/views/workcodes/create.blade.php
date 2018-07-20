@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/r-2.1.1/datatables.css"/>
@endpush

@section('content')
<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Create Workcode</h1>
            <p>Creates and add new workcode.</p>
            <p><a href="{{ url()->previous() }}" class="btn btn-primary"><i class="fa fa-chevron-circle-left"></i> Back to Workcodes</a></p>
        </div>

        <div class="panel-body">
            {!! Form::open(['route' => 'create.workcodes', 'class' => 'form-horizontal']) !!}

            <div class="form-group{{ $errors->has('WORKCODE') ? ' has-error' : '' }}">
                {!! Form::label('WORKCODE', 'Workcode', ['class' => 'control-label col-sm-2']) !!}
                <div class="col-sm-10">
                    {!! Form::text('WORKCODE', null, ['class' => 'form-control', 'required', 'autofocus']) !!}
                    @if ($errors->has('WORKCODE'))
                        <span class="help-block">
                            <strong>{{ $errors->first('WORKCODE') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 col-md-offset-2">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>

            {!! Form::close() !!}
        </div>

        {{--  <div class="panel-footer text-center">
            {!! $cdrs->links() !!}
        </div>  --}}
    </div>
</div>
@endsection

@push('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/r-2.1.1/datatables.js"></script>
@endpush