<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.offcanvas.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <link rel="shortcut icon" href="{{ asset('storage/favicon.ico') }}">

    @stack('styles')
</head>
<body>
    <div id="app">
    
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2">
                    <nav class="navbar navbar-default navbar-fixed-side">
                        <div class="container">
                            <div class="navbar-header">

                                <!-- Collapsed Hamburger -->
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                                    <span class="sr-only">Toggle Navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>

                                <!-- Branding Image -->
                                <a class="navbar-brand" href="{{ url('/') }}">
                                    <img src="{{ asset('storage/ipt-logo.png') }}" width="60" alt="IPT Logo" class="img-responsive">
                                    {{--  {{ config('app.name', 'Laravel') }}  --}}
                                </a>
                            </div>

                            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                                <!-- Left Side Of Navbar -->
                                @if(!Auth::guest()) 
                                    <ul class="nav navbar-nav">
                                        <li class="{{ active('home') }}"><a href="{{ url('/home') }}">Home</a></li>
                                        <li class="{{ active('dashboard') }}"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                                        <li class="{{ active('users') }}"><a href="{{ route('users') }}">Users</a></li>
                                        <li class="{{ active('agents') }}"><a href="{{ route('agents') }}">Agents</a></li>
                                        <li class="{{ active('cdr_report') }}"><a href="{{ route('cdr_report') }}">Call Detail Records</a></li>
                                        {{-- <li class="{{ active('cdr_report_new') }}"><a href="{{ route('cdr_report_new') }}">Call Detail Records #2</a></li> --}}
                                        <li class="{{ active('ready_report') }}"><a href="{{ route('ready_report') }}">Ready/Not Ready Report</a></li>
                                        <li class="{{ active('consolidated_1_report') }}"><a href="{{ route('consolidated_1_report') }}">Consolidated Report #1</a></li>
                                        <li class="{{ active('consolidated_2_report') }}"><a href="{{ route('consolidated_2_report') }}">Consolidated Report #2</a></li>
                                        <li class="{{ active('get_abondaned_report') }}"><a href="{{ route('get_abondaned_report') }}">Abondaned Call Report</a></li>
                                        <li class="{{ active('get_enterqueue_report') }}"><a href="{{ route('get_enterqueue_report') }}">Enter Queue Report</a></li>
                                        <li class="{{ active('get_agentconnect_report') }}"><a href="{{ route('get_agentconnect_report') }}">Agent Connect Report</a></li>
                                        <li class="{{ active('settings') }}"><a href="{{ route('settings') }}">Settings</a></li>
                                    </ul>
                                @endif

                                <!-- Right Side Of Navbar -->
                                <ul class="nav navbar-nav navbar-right">
                                    <!-- Authentication Links -->
                                    @if (Auth::guest())
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                        {{--  <li><a href="{{ route('register') }}">Register</a></li>  --}}
                                    @else
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>

                                            <ul class="dropdown-menu" role="menu">
                                                <li>
                                                    <a href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();">
                                                        Logout
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        {{ csrf_field() }}
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-10">
                    <div class="row">
                        <div class="container-fluid content">
                            @yield('content')
                        </div>
                    </div>
                    <footer>
                        <p class="text-center">Made with <i class="fa fa-heart" style="color:red;"></i> by <strong>Abdullah Basit</strong></p>
                    </footer>
                </div>
            </div>
        </div>
        
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/bootstrap.offcanvas.js') }}"></script>
    @stack('scripts')
</body>
</html>
