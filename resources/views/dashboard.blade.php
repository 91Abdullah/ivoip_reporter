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
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
    <link rel="shortcut icon" href="{{ asset('storage/favicon.ico') }}">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

    @stack('styles')
</head>
<body>
    <div id="app">
    
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1">
                    <div class="row">
                        <div class="container-fluid content">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h2 class="text-center "><strong>iVoIP Agent Wallboard</strong></h2>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-3 dash-box">
                                            <div class="row">
                                                <div class="col-lg-4 img-box">
                                                    <img src="data:image/png;base64,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">
                                                </div>
                                                <div class="col-lg-8 content-box">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <span class="small-text">Total Calls Landed</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <span class="big-text">69</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-3 dash-box">
                                            <div class="row">
                                                <div class="col-lg-4 img-box">
                                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAp5SURBVHhe7VtpbFPZFaZ7q7bqom6q1L39Na0qVVWrtuqiVurfSm1HHanqIs0IDd6ysYRlCFMKBLwkDg62Y793bSeOE2MHggZKMoQAZQ0JCdnIvjBQCIEkBIgdltyec+99jo0fOwl5TD7pU+z3ns+757v3nnvukiWLWMT8IPxq+ENWg+ywGsh/zTmBT4rL7w/k5eV92Kon5eA8tRjILbtR+qK49fIjLy/8UXA+is7D30mzzvcrcev9AYte3sacN5CJAr3/Z+KyNsFq00BeB9YCRy0GeQZq9Q5+dq0ODrpXBl8TjyYAArxh0ZMWm17+kbikTVgN0g+tevkcOIu1+SDeMxvk34qfPDasWZ7Pg5CvWZa6vyAuLSxYjPLPMXihk85Vvsst+yqmd6z0M6d7Ghrp1JVeeiRcx75DjZ8SP3skbAbyCxgZAsCYELBQ3Fo4sC2Tvg0Fm8ACVtlLb0wNRen0e1W0vrScORzdXk1vjw/Q+NV+6l7Lr5n15Dfi52lw6Byfgi6hhxpvw2cZ9eQetK53thl93xGPLQzg8AU134SFjNhKaWy4ijmPHG2LUJuRMF4b7GQiHKs+pDgUFSbSALV9QHEcWsv/4Pu/zTrvN8TthQWzQcrCgu5YSe5c7+U1n0wUBe8fguaPAoy/10ULTD4WGAtN/q8LMymAe5ngdDX8/ZN7qfsj4vLCA2Zr4NwoOti8tyLNeWR3fSUToHhl6UxstI+JsMe9l7cCqFlhSpuw6cmb6EjJGn8sNpxe+8j4+SrqXuNjDrfWn2ACDDY3KwJcwmFTmNMerEb5KDrSuEe99hUeC4eYw8H8CBMASd4Oz+A1yBP+IsxpC1tXeD8NDtxDJ662Vao6rnCiO0ILTTyoXexsZQI01RxVWsFhYVJbwGEMHZDXyTTWG1B1PJl7isuYw/t9+5kAt0Z6aVGmnwlo0/leEWYZzG8GvoTdgwvEyTJKAzGLR148MH3FglUXSHSqo4ROn1ePAQoHju9kjtiz/PTGpR4mwrulNcJB2SHMMqAAfPhbyAIYSC4WbL/TS6fanDTeX67qeDLJBp4ZNuw9wgS43NPGndPL1zH5Eaa1AUWAOg8XINbpVXU6mY3VFcxhKS9Eb4/xYFhujuJECdcA/ilMawNQaBMWfJ+DC4CcHnj4aHCjP0qLsvmQ2He6iQlwNFrPvmsuJ7AYyV+x4FWWWQFi5zyqjiezxhtkDu8q3sNaQTA/KgTw/V2Y1gZseu+PseCeNSQhADLeH1R1XOHFJh4MIR2GIFjLPhflBK5pbg3QbrR/zGaQWf+91jArwFR7CWR/Dx8Ryrfw+QGjXp62GqVfC7Pagj2THEcnmiIlKa0g1kVUHVd4pJxPiZFmHfmbMKc9gAMsEO7cBrlAkgDI+EBI1fnzDTshF+CBEMb2t4UpbaLQ5PkydIO7ON+/fNyVIkCs3QXJ0c40AYJbAqL25YAwo23YM3270KEakRCl8JwEIqQK4Mjhtf+gtQDNgS2EGsgMTnbubwXIeG9pigBlm3gLsOjJRmFC+yjKIdXo1DtFKq0AukJ8cHa2eO4gXyAB3jGbvN8XJrQNXKiEOHAPY8FgnTtdBJgsjbSG6WQfHx53FfFhEJ4/hWuKwoy2sT2bFKNTOD2ebE4VYPy0i60HyOv99NZAlI51RhOxAOYAm4UJbcOaVfkJRzYZQafqPJ4UAW61Oqlvg8QcrpV5pth5INEVZmxG3++FGW0DhsRfWo3oEKG9Nald4cJh3grgPr3QGGEi1Ep8XgACTG41yd8TZrQN5+qAE51yryJ0vHFWAGRj2EMrNkt0vJPPGqeGq2goP5EW970UW+K4jl+8gnSjU1FLeoaIjHW4aXwozESY6I5S71siOdLLZ3APUJjSLsyGwLcKM2CSA06dCqXGA4V1Xi90gTLWCq607qSuXL5ahLtMW5YFPydMPTPy/kE+Lj7OL2yZXrZegP2+tyZ1soTELoL3d9tLmQgjZyPUmetTlsrbUURh6omRv9T9GaueSBCLsBLu4sqz2SD/EYbcD4pH5geQIO1Ah4qXy/TysdQs8Xy9G4ZCmYlQXVRGcWNlpDVCXat9t/EaFHrkaQ5LsHNGelLHbEDALczkLQsJ2WcX/H193jZjsDCQHxzCl5P1Mp1oSm0FwyDC9mwhwvZSGoeWMNEVxXyBDae4VoBrj09Sc+D8BvytY3npzdH+Tjo12kfP1B6j3rwK1roELwJz5mUhFptjYSYZwheHNklpSdIQZI4gEitYxBpg64a4vb7bUXZZFBZr7ohV5/muMPlAWHTkd9B9oMkT+m6g5m78Wj9bd0ROj/XTc8caaHBrlO1FCLtX4Pk1uMkjTMwNCjLIN+0ZfBM1YpbojbPpIsDIwQrl/5efjrbzPKEL5g2OFdiH4R62Br1sAVufFWZTsFXv/Sp2G8U5pHtt+XTrweM0WQjkwJkztNxcxe0CQYhr0HLWP8/gmwabzveKLUO+ji/cXeClN+8T4RLECEyj8b4jh7BJEx8mI/Q/7iA7YyAKPAaF3bRNR74iTLOuxloJ3K+0lNLmfRXUs26275esC93Gjdn7hcBN2gpzlYg5KIQ8DlwuzD5/mHXST20mfowGW8L93WGiyUV323jKjNznClLlzAFmjxXblMUURowPPotOWgatYx9eK1nrZ3kFPo9BVUWIO2pCDLU005ClKq48B/ZWiSI/f1gNvp8UmMgkvqhyi0Svn0kVAdkAuYM9kxfGucpH22ohcxQLK0Mnw3Q3jBpJLSLx3MXG9BUoNSG8b5XfVRMCr+F96GZtorhzA1D4B/CSq/gynCSNqCykXDrqYkFTKXRwc4Be7eCxAYnHb05GQ2yfoaGqgl7vefhKtKoQ68vvJQtxpa+DXYfA2CmKOnfAyQ+IMIwv3LFCpv216SJMwSzy7C43defy2NDygFMoT8IHCDGDQgyfbRECkCZRzLkF5v2FGTx4YcZ4IggZIzh9vxCTLS7asx9mlx3exBziWZkQAuKGIoQ9y8dGBmgBIVHEuQeuCEF/ZospSIwLV06mi5Bgu5PGu32P3Hx5XKoJAcPpOlG8+YPZKP0ZRgh21hBT5MbKEraQoioCMNYOM8q+skeeS3hc4vG+wkx+GPOFnVfmyQw7Y8xqwg8BUjU2JJFNrfsgjT4/GyCfhsppNuAo5hWiSPMPuoR+ALfLrHopcUQmnO9NW2FKp5vGevxPFSMw2XLm+nlCBBmhKMqLBU5UoEBmYCJBKdso0+ZICQuK6iJw4mGN2GN2j3GYfAU2Kv1fPotrm6IICwO4/QbDUj4U7oYiBE6ealweOnzw4ULgnkQMA+ag+vCJzR4TKLQJydmFZ1mDmHPgJAgKaoJA2aEIgZTWyvSw7GHrC2pDaIIoRpfMzi8Mn6ikoa0BtrWPhNlqi2WZ/DXxqoUPfjhDdsPwmWgVSOdKme1Ona4ooYMH3HT0pIuON7pYpol5xBG/h8rrZ7NLmPhMwZifh2cdhGltAfurTSf/AVJrAmKMJYvxMBZlyXdDW7wNL80GLQKHLvznCqjVbMzkbCa522aUx+DzTIFRvrk9Wx50rZKq3bneVzV9PnkRi1jEIhYxr1iy5P8EDX82EGshvQAAAABJRU5ErkJggg==">
                                                </div>
                                                <div class="col-lg-8 content-box">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <span class="small-text">Total Calls Landed</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <span class="big-text">69</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-3 dash-box">
                                            <div class="row">
                                                <div class="col-lg-4 img-box">
                                                    <img src="data:image/png;base64,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">
                                                </div>
                                                <div class="col-lg-8 content-box">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <span class="small-text">Total Calls Landed</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <span class="big-text">69</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-lg-3 dash-box">
                                            <div class="row">
                                                <div class="col-lg-4 img-box">
                                                    <img src="data:image/png;base64,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">
                                                </div>
                                                <div class="col-lg-8 content-box">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <span class="small-text">Total Calls Landed</span>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <span class="big-text">69</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
</body>
</html>
