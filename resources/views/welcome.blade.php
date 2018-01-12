<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="{{ asset('storage/favicon.ico') }}">

        <!-- Styles -->
        <style>
            
            @font-face {
                font-family: 'ThirstyScriptExtraboldDemo';
                src: url('{{ asset("storage/fonts/ThirstyScriptExtraboldDemo.eot?#iefix") }}') format('embedded-opentype'),  
                url('{{ asset("storage/fonts/ThirstyScriptExtraboldDemo.otf") }}')  format('opentype'), 
                url('{{ asset("storage/fonts/ThirstyScriptExtraboldDemo.woff") }}') format('woff'), 
                url('{{ asset("storage/fonts/ThirstyScriptExtraboldDemo.ttf") }}')  format('truetype'), 
                url('{{ asset("storage/fonts/ThirstyScriptExtraboldDemo.svg#ThirstyScriptExtraboldDemo") }}') format('svg');
                font-weight: normal;
                font-style: normal;
            }


            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <img src="{{ asset('storage/ipt-logo.png') }}" alt="IPT Logo" class="img-responsive"> <br />
                    iVoIP Reporter
                </div>

                <div class="links">
                    
                </div>
            </div>
        </div>
    </body>
</html>
