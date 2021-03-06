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

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    {{--load style sheet for databasetables--}}
    <link href="https://cdn.datatables.net/buttons/1.4.2/css/buttons.dataTables.min.css" rel="stylesheet">

    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.metismenu/1.1.2/css/metismenu.min.css">

    <!-- Custom CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7+1/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">

    <!-- Custom Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css" rel="stylesheet">

    @stack('css')

    <style>
        a{
            text-decoration: none !important;
            outline: none !important;
        }

        :root {
            --bl-color:#0A5E9A;
            --gr-color:#00A65B;
            --re-color:#F04100;
            --or-color:#F08800;
            --wh-color:#FFFFFF;
            --blk-color:#222222;
            --blk-3-color:#33333;
        }

        .pagination span:active,
        .pagination span:focus,
        .pagination a:active,
        .pagination a:focus{
            outline: none !important;
        }
        .pagination a{
            color: var(--blk-3-color) !important;
            font-weight: 400 !important;
        }
        .pagination .active a{
            background-color: var(--bl-color) !important;
            border: 1px solid var(--bl-color) !important;
            color: var(--wh-color) !important;
        }

        #table_previous{ color: var(--blk-3-color)!important}
        #table_next{ color: var(--blk-3-color) !important}

        .pagination > .disabled > span,
        .pagination > .disabled > span:hover,
        .pagination > .disabled > span:focus,
        .pagination > .disabled > a,
        .pagination > .disabled > a:hover,
        .pagination > .disabled > a:focus{
            background-color: #eee;
            border-color: #ddd;
        }

       .table-pagination-btn > a,
       .table-pagination-btn > span{
            padding: 1px 8px !important;
        }

        #page-wrapper{
            background: #E5E0E6 !important;
        }
        .panel-content{
            background: var(--wh-color);
            border: 0px;
            position: relative;
            z-index: 999;
            /*background: #ff6666 !important;*/
        }
        .panel-content .fa{
            /*color: #333333 !important;*/
        }

        #DataTables_Table_0_wrapper .row:first-child{
            border-bottom: 1px solid #DDDDDD;
            margin-bottom: 15px;
            padding-bottom: 15px;
        }
        #DataTables_Table_0_wrapper .row:last-child{
            border-top: 1px solid #DDDDDD;
            margin-top: 15px;
            padding-top: 15px;
        }
        .navbar-static-top{
            background: var(--blk-color) !important;
            border-bottom: none;
        }
        .navbar-static-top .fa{
            color: var(--wh-color) !important;
        }

        .navbar-static-top .active .fa,
        .nav>li>a:focus,
        .nav>li>a:hover{
            color: var(--blk-color) !important;
        }
        .navbar-static-top .dropdown-menu .fa{
            color: var(--blk-color) !important;
        }
        #side-menu {transition: width 2s linear 1s}
        #side-menu a,
        #side-menu .fa{
            color: var(--blk-color) !important;
        }
        #side-menu .active{
            background: #f5f8fa;
            border-left: 5px solid var(--gr-color);
        }
        #side-menu a:hover {
            border-left: 5px solid var(--or-color);
        }
        /*#side-menu .nav>li>a:focus,*/
        /*#side-menu .nav>li>a:hover {*/
            /*border-left: 5px solid #00A65A;*/
            /*color: var(--blk-color) !important;*/
        /*}*/
        .breadcrumb{
            border-radius: 0px;
            border: none;
            margin: 0 -15px;
            background: var(--gr-color);
        }
        .breadcrumb li a{
            color: var(--blk-color) !important;
        }
        .breadcrumb > .active{
            color: var(--wh-color) !important;
        }

        .box {
            /*padding-left: 20px;*/
            position: relative;
            /*border-radius: 1px;*/
            background: var(--wh-color);
            border-left: 3px solid #d2d6de;
            /*margin-bottom: 20px;*/
            width: 100%;
            box-shadow: 0 1px 1px rgba(0,0,0,0.1);
        }

        .box.box-warning { border-left-color: var(--or-color) !important; }
        .box.box-danger { border-left-color: var(--re-color) !important; }
        .box.box-success { border-left-color: var(--gr-color) !important; }
        .box.box-primary { border-left-color: var(--bl-color) !important; }

        .btn-warning{ background-color: var(--or-color) !important; }
        .btn-danger{ background-color: var(--re-color) !important; }
        .btn-success{ background-color: var(--gr-color) !important; }
        .btn-primary{ background-color: var(--bl-color) !important; }

        .no-sort::after { display: none!important; }
        .no-sort { pointer-events: none!important; cursor: default!important; }
    </style>

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('staff.index')}}">Qemos - v1.2</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li>
                    {{ Form::open(['route' => 'staff.location.switch', 'style' => 'display: inline-block;', 'method' => 'patch']) }}
                        <div class="input-group" style="min-width: 200px; width: 200px; margin-bottom: -12px ;">
                            <span class="input-group-addon">
                                <i class="glyphicon glyphicon-map-marker"></i>
                            </span>
                            {{ Form::select('location',auth()->user()->locations(), session('location'),
                            ['onchange'=>'submit()', 'class' => 'form-control', auth()->user()->locations()->count() == 1 ? 'disabled' : ''])}}
                        </div>
                    {{ Form::close()}}
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}

                            </form>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            {{--@include('components.left-sidebar-staff')--}}
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav in" id="side-menu">
                        <li>
                            <a href="{{route('staff.index')}}" class="{{ !Request::is('staff') ? : 'active' }}">
                                <i class="fa fa-dashboard fa-fw" aria-hidden="true"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="{{route('staff.menu.index')}}" class="{{ !Request::is('staff/menu*') ? : 'active' }}">
                                <i class="fa fa-book fa-fw" aria-hidden="true"></i>
                                Menu
                            </a>
                        </li>
                        <li>
                            <a href="{{route('staff.ingredient.index')}}" class="{{ !Request::is('staff/ingredient*') ? : 'active' }}">
                                <i class="fa fa-lemon-o fa-fw" aria-hidden="true"></i>
                                Ingredient
                            </a>
                        </li>
                        @can('staff-product.view')
                            <li>
                                <a href="{{route('staff.product.index')}}" class="{{ !Request::is('staff/product*') ? : 'active' }}">
                                    <i class="fa fa-tag fa-fw" aria-hidden="true"></i>
                                    Producten
                                </a>
                            </li>
                        @endcan
                        <li>
                            <a href="{{route('staff.tafel.index')}}" class="{{ !Request::is('staff/tafel*') ? : 'active' }}">
                                <i class="fa fa-cutlery fa-fw" aria-hidden="true"></i>
                                tafels
                            </a>
                        </li>
                        <li>
                            <a href="{{route('staff.user.index')}}" class="{{ !Request::is('staff/user*') ? : 'active' }}">
                                <i class="fa fa-users fa-fw" aria-hidden="true"></i>
                                users
                            </a>
                        </li>
                        <li>
                            <a href="{{route('staff.order.index')}}" class="{{ !Request::is('staff/order*') ? : 'active' }}">
                                <i class="fa fa-shopping-basket fa-fw" aria-hidden="true"></i>
                                orders
                            </a>
                        </li>
                        <li>
                            <a href="{{route('staff.kiosk.index')}}" class="{{ !Request::is('staff/kiosk*') ? : 'active' }}">
                                <i class="fa fa-tablet fa-fw" aria-hidden="true"></i>
                                kiosk
                            </a>
                        </li>
                        {{--<li>--}}
                            {{--<a href="{{route('staff.booking.index')}}" class="{{ !Request::is('staff/booking*') ? : 'active' }}">--}}
                                {{--<i class="fa fa-address-book-o fa-fw" aria-hidden="true"></i>--}}
                                {{--reserveringen--}}
                            {{--</a>--}}
                        {{--</li>--}}
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

    </div>

    <div id="page-wrapper">
        <div class="row">
            {!! Breadcrumbs::render(Request::route()->getName()) !!}
        </div>
        <div class="container-fluid">

            <div class="row">
                <br>
                @include('errors.message')

                @yield('content')
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- javascript money mask on inputs --}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

    <script src="//cdn.jsdelivr.net/bootstrap.metismenu/1.1.2/js/metismenu.min.js"></script>

    <script type="text/javascript">
        //call on metis menu
        $("#side-menu").metisMenu();
        $(".nav").metisMenu();
//        $(".navbar-top-links").metisMenu();

    </script>

    @stack('js')

</body>
</html>
