
@extends('layouts.app')

@section('content')
<div class="col-md-10 col-md-offset-1">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h1>Settings</h1>
            <p>Edit application settings.</p>
        </div>

        <div class="panel-body">
            {!! Form::model($setting, ['route' => 'post.settings', 'method' => 'PATCH']) !!}
            <div class="form-group">
                {!! Form::label('ProxyIP', 'Asterisk IP') !!}
                {!! Form::text('ProxyIP', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Port', 'Port') !!}
                {!! Form::text('Port', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('ManagerUsername', 'Manager Username') !!}
                {!! Form::text('ManagerUsername', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('ManagerPassword', 'Manager Password') !!}
                {!! Form::text('ManagerPassword', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('ManagerPort', 'Manager Port') !!}
                {!! Form::text('ManagerPort', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Queue', 'Queue') !!}
                {!! Form::text('Queue', null, ['class' => 'form-control']) !!}
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