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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/bootstrap.metismenu/1.1.2/css/metismenu.min.css">

    <!-- Custom CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/startbootstrap-sb-admin-2/3.3.7+1/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    {{--<link href="http://cdn.oesmith.co.uk/morris-0.5.1.css" rel="stylesheet">--}}

    <!-- Custom Fonts -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css" rel="stylesheet">

    @stack('css')

    <style>
        #page-wrapper{
            background: #E5E0E6 !important;
        }
        .panel-content{
            background: #FFFFFF;
        }


        /*@import "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";*/
        /*html {*/

        /*-webkit-text-size-adjust: 100%;*/
        /*-ms-text-size-adjust: 100%;*/
        /*}*/
        /*body {*/
        /*margin: 0;*/
        /*}*/

        /*html, body {*/
        /*width: 100%;*/
        /*height: 100%*/
        /*}*/
        /*article, aside, details, figcaption, figure, footer, header, main, menu, nav, section, summary {*/
        /*display: block;*/
        /*}*/
        /*audio, canvas, progress, video {*/
        /*display: inline-block;*/
        /*vertical-align: baseline;*/
        /*}*/
        /*audio:not([controls]) {*/
        /*display: none;*/
        /*height: 0;*/
        /*}*/

        /*a {*/
        /*background-color: transparent;*/
        /*text-decoration: none;*/
        /*}*/
        /*a:active, a:hover {*/
        /*outline: 0;*/
        /*}*/

        /*h1,h2,h3,h4,h5,h6,p,ul,ol{ margin:0px; padding:0px;}*/


        /*!***********************  TOP Bar ********************!*/
        /*.sidebar{ width:220px;  background-color:#000;transition: all 0.5s  ease-in-out; }*/
        /*.bg-defoult{background-color:#222;}*/
        /*.sidebar ul{ list-style:none; margin:0px; padding:0px; }*/
        /*.sidebar li a,.sidebar li a.collapsed.active{ display:block; padding:8px 12px; color:#fff;border-left:0px solid #dedede;  text-decoration:none}*/
        /*.sidebar li a.active{background-color:#000;border-left:5px solid #dedede; transition: all 0.5s  ease-in-out}*/
        /*.sidebar li a:hover{background-color:#000 !important;}*/
        /*.sidebar li a i{ padding-right:5px;}*/
        /*.sidebar ul li .sub-menu li a{ position:relative}*/
        /*.sidebar ul li .sub-menu li a:before{*/
            /*font-family: FontAwesome;*/
            /*content: "\f105";*/
            /*display: inline-block;*/
            /*padding-left: 0px;*/
            /*padding-right: 10px;*/
            /*vertical-align: middle;*/
        /*}*/
        /*.sidebar ul li .sub-menu li a:hover:after {*/
            /*content: "";*/
            /*position: absolute;*/
            /*left: -5px;*/
            /*top: 0;*/
            /*width: 5px;*/
            /*background-color: #111;*/
            /*height: 100%;*/
        /*}*/
        /*.sidebar ul li .sub-menu li a:hover{ background-color:#222; padding-left:20px; transition: all 0.5s  ease-in-out}*/
        /*.sub-menu{ border-left:5px solid #dedede;}*/
        /*.sidebar li a .nav-label,.sidebar li a .nav-label+span{ transition: all 0.5s  ease-in-out}*/


        /*.sidebar.fliph li a .nav-label,.sidebar.fliph li a .nav-label+span{ display:none;transition: all 0.5s  ease-in-out}*/
        /*.sidebar.fliph {*/
            /*width: 42px;transition: all 0.5s  ease-in-out;*/

        /*}*/

        /*.sidebar.fliph li{ position:relative}*/
        /*.sidebar.fliph .sub-menu {*/
            /*position: absolute;*/
            /*left: 39px;*/
            /*top: 0;*/
            /*background-color: #222;*/
            /*width: 150px;*/
            /*z-index: 100;*/
        /*}*/
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
                <a class="navbar-brand" href="index.html">Staff Panel</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li>
                    {{--<a>--}}
                        <label style="display: inline-block;"> Location:</label>
                        {{ Form::open(['route' => 'staff.location.switch', 'style' => 'display: inline-block;', 'method' => 'patch']) }}
                        {{ Form::select('location',auth()->user()->locations(), session('location'), ['onchange'=>'submit()'])}}
                        {{ Form::close()}}
                    {{--</a>--}}
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
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
                                <i class="fa fa-bars fa-fw" aria-hidden="true"></i>
                                Menu
                            </a>
                        </li>
                        <li>
                            <a href="{{route('staff.ingredient.index')}}" class="{{ !Request::is('staff/ingredient*') ? : 'active' }}">
                                <i class="fa fa-lemon-o fa-fw" aria-hidden="true"></i>
                                Ingredient
                            </a>
                        </li>
                        <li>
                            <a href="{{route('staff.product.index')}}" class="{{ !Request::is('staff/product*') ? : 'active' }}">
                                <i class="fa fa-tag fa-fw" aria-hidden="true"></i>
                                Producten
                            </a>
                        </li>
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
                            <a href="{{route('staff.tafel.index')}}" class="{{ !Request::is('staff/tafel*') ? : 'active' }}">
                                <i class="fa fa-shopping-basket fa-fw" aria-hidden="true"></i>
                                orders
                            </a>
                        </li>
                        <li>
                            <a href="{{route('staff.tafel.index')}}" class="{{ !Request::is('staff/tafel*') ? : 'active' }}">
                                <i class="fa fa-tablet fa-fw" aria-hidden="true"></i>
                                kiosk
                            </a>
                        </li>
                        <li>
                            <a href="{{route('staff.tafel.index')}}" class="{{ !Request::is('staff/tafel*') ? : 'active' }}">
                                <i class="fa fa-book fa-fw" aria-hidden="true"></i>
                                reserveringen
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

    </div>

    <div id="page-wrapper">
        {!! Breadcrumbs::render(Request::route()->getName()) !!}
        <div class="container-fluid">

            <div class="row">
                @yield('content')
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- javascript money mask on inputs --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
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

        $(document).ready(function(){
            $('.table ').DataTable();
        });
    </script>

    @stack('js')

</body>
</html>
