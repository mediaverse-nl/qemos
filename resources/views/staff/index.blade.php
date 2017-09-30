@extends('layouts.staff')

@section('content')
<div class="container">

    <div class="row">

        <div class="col-lg-6">
            <div class="panel panel-content">
                <a href="{{route('staff.index')}}">
                    <div class="panel-body">
                        <h1 class="text-center">tafels</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-content">
                <a href="{{route('staff.index')}}">
                    <div class="panel-body">
                        <h1 class="text-center">Gebruikers</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-content">
                <a href="{{route('kiosk.order.index')}}">
                    <div class="panel-body">
                        <h1 class="text-center">ingredienten</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-content">
                <a href="{{route('kiosk.order.index')}}">
                    <div class="panel-body">
                        <h1 class="text-center">menus</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-content">
                <a href="{{route('kiosk.order.index')}}">
                    <div class="panel-body">
                        <h1 class="text-center">bestellingen</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-content">
                <a href="{{route('kiosk.order.index')}}">
                    <div class="panel-body">
                        <h1 class="text-center">producten</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-content">
                <a href="{{route('kiosk.booking.index')}}">
                    <div class="panel-body">
                        <h1 class="text-center">reserveringen</h1>
                    </div>
                </a>
            </div>
        </div>

        {{--<div class="col-lg-4">--}}
            {{--<div class="panel panel-content">--}}
                {{--<a href="{{route('tafel.index')}}">--}}
                    {{--<div class="panel-body">--}}
                        {{--<h1 class="text-center">tafels</h1>--}}
                    {{--</div>--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}

    </div>
</div>
@endsection
