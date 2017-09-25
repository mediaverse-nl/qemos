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

    {{--load style sheet for databasetables--}}
    {{--<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">--}}
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.metismenu/1.1.2/css/metismenu.min.css">

    <!-- Custom CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7+1/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    {{--<link href="http://cdn.oesmith.co.uk/morris-0.5.1.css" rel="stylesheet">--}}

    <!-- Custom Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css" rel="stylesheet">

    <!-- Bootstrap Core JavaScript -->
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>--}}

    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>--}}
    {{--<script src="//code.jquery.com/jquery-1.10.2.js"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>--}}

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    {{--<nav class="navbar navbar-inverse" style="min-height: 30px !important; margin-bottom: 0px !important;">--}}
        {{--<div class="container">--}}
            {{--<div class="navbar-header">--}}
                {{--<a href="{{route('dashboard')}}" class="btn btn-default btn-xs" style="margin-top: 3px;">admin</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</nav>--}}
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Qemos</a>
                <a class="navbar-brand" href="{{route('order.index')}}">Tafel</a>
                <a class="navbar-brand" href="#"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">WHO</a></li>
                    <li><a href="#">WHAT</a></li>
                    <li><a href="#">WHERE</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            @yield('content')
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- javascript money mask on inputs --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.10.12/datatables.js" type="text/javascript"></script>
    <script src="//cdn.jsdelivr.net/bootstrap.metismenu/1.1.2/js/metismenu.min.js"></script>

    <script type="text/javascript">
        //call on metis menu
        $("#side-menu").metisMenu();
        $(".nav").metisMenu();
//        $(".navbar-top-links").metisMenu();

        $(document).ready(function() {
            $('#dataTables').DataTable({
                responsive: true
            });
        });
    </script>

    <meta name="_token" content="{!! csrf_token() !!}" />

    @stack('js')

</body>
</html>
