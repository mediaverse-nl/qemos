<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <style>
        .vertical-center {
            min-height: 100%;  /* Fallback for browsers do NOT support vh unit */
            min-height: 100vh; /* These two lines are counted as one :-)       */

            display: flex;
            align-items: center;
        }
    </style>

</head>
<body>

    <div class="vertical-center">
        <div class="container">
            <div class="panel panel-content">
                <div class="panel-body">
                    {{--<div class="row">--}}
                    @yield('content')
                    {{--</div>--}}
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
        </div>

    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    @stack('js')

</body>
</html>
