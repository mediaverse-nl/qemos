<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="_token" content="{!! csrf_token() !!}" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Kiosk</title>

    <!-- Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    @stack('css')

<!-- Styles -->
    <style>
        .vertical-center {
            min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
            min-height: 100vh; /* These two lines are counted as one :-)       */

            display: flex;
            align-items: center;
        }
        body{
            background: #d9d9d9;
        }
         input[type=text] {
            width: 130px;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            background-color: white;
            background-image: url('https://www.w3schools.com/howto/searchicon.png');
            background-position: 10px 15px;
            background-repeat: no-repeat;
            padding: 12px 20px 12px 40px;
            -webkit-transition: width 0.4s ease-in-out;
            transition: width 0.4s ease-in-out;
        }

         input[type=text]:focus {
            width: 100%;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-default navbar-fixed-top" style="background: #50A7DD; border: none;">
        <div class="container">
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav" style="width: 50%;">
                    {{--<form>--}}
                    <input type="text" name="search" placeholder="Search.." style="margin: 5px 0px;">
                    {{--</form>--}}
                    {{--<li class="active" style="margin:0px auto">--}}
                        {{--<a href="#" style="color: #FFFFFF; background: #52bdf4 !important;"><input id="search" class="form-control" name="search" placeholder="Search"></a>--}}
                    {{--</li>--}}
                    {{--<li><a href="#about">About</a></li>--}}
                    {{--<li><a href="#contact">Contact</a></li>--}}
                    {{--<li class="dropdown">--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li><a href="#">Action</a></li>--}}
                            {{--<li><a href="#">Another action</a></li>--}}
                            {{--<li><a href="#">Something else here</a></li>--}}
                            {{--<li role="separator" class="divider"></li>--}}
                            {{--<li class="dropdown-header">Nav header</li>--}}
                            {{--<li><a href="#">Separated link</a></li>--}}
                            {{--<li><a href="#">One more separated link</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active" >
                        <a id="cart" href="#" style="color: #FFFFFF; background: #52bdf4 !important;">
                            {{--<i class="fa fa-eur" aria-hidden="true" style="font-size: 37px;"> <span>15.00</span></i>--}}
                            <b style="font-size: 20px; margin-top: -10px;">Winkelwagen</b>
                            <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 37px;"></i>
                            <div style="background: black; border-radius: 50%; height: 20px; width: 20px; padding: 1px;position: absolute; margin-top: -40px; right: 5px;">
                                <p class="text-center" style="color:#FFFFFF;"><b>4</b></p>
                            </div>
                        </a>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <div id="app" style="margin-top: 100px;">
        <div class="vertical-center">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    @stack('js')

</body>
</html>
