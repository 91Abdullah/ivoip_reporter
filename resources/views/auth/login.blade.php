@extends('layouts.app')

@push('styles')
    <style>
        body {
            height: 100%;
            background-image: url("{{ asset('storage/blue-white-swirls-design.jpg') }}");
            background-position: center center;
            background-size: cover; 
            background-repeat: no-repeat;
        }
    </style>
@endpush

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <div style="margin-top: 35%" class="media">
                            <div class="media-left media-middle">
                                <a href="#">
                                    <img src="{{ asset('storage/mainwindowlogo.png') }}" alt="">
                                </a>
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading"><strong>iVoIP<sup>TM</sup></strong></h4>
                                <h4 style="color: #08BCDD; font-weight: bold;">Premium Reporter for Contact Center</h4>
                                <i>version 2.0.0</i>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 hr-horizontal">
                        <h2>Sign In</h2>
                        <form class="" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">E-Mail Address</label>

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">Password</label>

                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
