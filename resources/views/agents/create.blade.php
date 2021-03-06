
@extends('layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Agent</h1>
            <p>Add a new agent.</p>
        </div>

        <div class="panel-body">
            

            {!! Form::open(['route' => 'post.agent', 'method' => 'POST']) !!}
            <div class="form-group {{ $errors->has('Name') ? 'has-error' : '' }}">
                {!! Form::label('Name', 'Name', ['class' => 'control-label']) !!}
                {!! Form::text('Name', null, ['class' => 'form-control']) !!}
                @if ($errors->has('Name'))
                    <span class="help-block">{{ $errors->first('Name') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('Extension') ? 'has-error' : '' }}">
                {!! Form::label('Extension', 'Extension', ['class' => 'control-label']) !!}
                {!! Form::text('Extension', null, ['class' => 'form-control']) !!}
                @if ($errors->has('Extension'))
                    <span class="help-block">{{ $errors->first('Extension') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('Secret') ? 'has-error' : '' }}">
                {!! Form::label('Secret', 'Secret', ['class' => 'control-label']) !!}
                {!! Form::text('Secret', null, ['class' => 'form-control']) !!}
                @if ($errors->has('Secret'))
                    <span class="help-block">{{ $errors->first('Secret') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('SystemType') ? 'has-error' : '' }}">
                {!! Form::label('SystemType', 'System Type', ['class' => 'control-label']) !!}
                {!! Form::select('SystemType', ['io' => 'Inbound/Outbound', 'ib' => 'Inbound Only', 'ob' => 'Outbound Only'], 'ob', ['class' => 'form-control']) !!}
                @if ($errors->has('SystemType'))
                    <span class="help-block">{{ $errors->first('SystemType') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('SystemRights') ? 'has-error' : '' }}">
                {!! Form::label('SystemRights', 'System Rights', ['class' => 'control-label']) !!}
                {!! Form::select('SystemRights', ['A' => 'Agent', 'S' => 'Supervisor'], 'A', ['class' => 'form-control']) !!}
                @if ($errors->has('SystemRights'))
                    <span class="help-block">{{ $errors->first('SystemRights') }}</span>
                @endif
            </div>
            <div class="form-group {{ $errors->has('SystemRights') ? 'has-error' : '' }}">
                {!! Form::label('Queue', 'Queue', ['class' => 'control-label']) !!}
                {!! Form::text('Queue', null, ['class' => 'form-control']) !!}
                <span class="help-block">Enter "OUT" if agent is outbound.</span>
                @if ($errors->has('Queue'))
                    <span class="help-block">{{ $errors->first('Queue') }}</span>
                @endif
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