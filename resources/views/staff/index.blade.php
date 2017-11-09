@extends('layouts.staff')

@section('content')
{{--<div class="container">--}}

    {{--<div class="row">--}}
    <br>
    <br>

        <div class="col-lg-3">
            <div class="panel panel-content box box-success">
                <a href="{{route('staff.tafel.index')}}">
                    <div class="panel-body">
                        <div class="text-center">
                            <i class="fa fa-cutlery fa-5x" style="" aria-hidden="true"></i>
                        </div>
                        <h1 class="text-center">Tafels</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="panel panel-content box box-success">
                <a href="{{route('staff.user.index')}}">
                    <div class="panel-body">
                        <div class="text-center">
                            <i class="fa fa-users fa-5x" style="" aria-hidden="true"></i>
                        </div>
                        <h1 class="text-center">Gebruikers</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="panel panel-content box box-success">
                <a href="{{route('staff.ingredient.index')}}">
                    <div class="panel-body">
                        <div class="text-center">
                            <i class="fa fa-lemon-o fa-5x" style="" aria-hidden="true"></i>
                        </div>
                        <h1 class="text-center">Ingredienten</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="panel panel-content box box-success">
                <a href="{{route('staff.menu.index')}}">
                    <div class="panel-body">
                        <div class="text-center">
                            <i class="fa fa-book fa-5x" style="" aria-hidden="true"></i>
                        </div>
                        <h1 class="text-center">Menus</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="panel panel-content box box-success">
                <a href="{{route('staff.order.index')}}">
                    <div class="panel-body">
                        <div class="text-center">
                            <i class="fa fa-shopping-basket fa-5x" style="" aria-hidden="true"></i>
                        </div>
                        <h1 class="text-center">Bestellingen</h1>
                    </div>
                </a>
            </div>
        </div>

        @can('product.view')
            <div class="col-lg-3">
                <div class="panel panel-content box box-success">
                    <a href="{{route('staff.product.index')}}">
                        <div class="panel-body">
                            <div class="text-center">
                                <i class="fa fa-tag fa-5x" style="" aria-hidden="true"></i>
                            </div>
                            <h1 class="text-center">Producten</h1>
                        </div>
                    </a>
                </div>
            </div>
        @endcan

        {{--<div class="col-lg-2">--}}
            {{--<div class="panel panel-content">--}}
                {{--<a href="{{route('staff.booking.index')}}">--}}
                    {{--<div class="panel-body">--}}
                        {{--<div class="text-center">--}}
                            {{--<i class="fa fa-address-book-o fa-5x" style="" aria-hidden="true"></i>--}}
                        {{--</div>--}}
                        {{--<h1 class="text-center">Reservaties</h1>--}}
                    {{--</div>--}}
                {{--</a>--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="col-lg-3">
            <div class="panel panel-content box box-success">
                <a href="{{route('staff.kiosk.index')}}">
                    <div class="panel-body">
                        <div class="text-center">
                            <i class="fa fa-tablet fa-5x" style="" aria-hidden="true"></i>
                        </div>
                        <h1 class="text-center">Kiosk</h1>
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

    {{--</div>--}}
{{--</div>--}}
@endsection

@push('css')
    <style>
        /*.fa { transform: scale(1.5,1); }*/
    </style>
@endpush
