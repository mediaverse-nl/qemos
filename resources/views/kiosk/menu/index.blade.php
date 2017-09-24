@extends('layouts.kiosk')

@section('content')
{{--<div class="container">--}}

    <h1>Dashboard</h1>
    <hr>
    {!! Breadcrumbs::render('home') !!}
    <hr>

    <div class="row">

        <div class="col-lg-4">
            <div class="panel panel-default">
                <a href="{{route('product.index')}}">
                    <div class="panel-body">
                        <h1>Products</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel panel-default">
                <a href="{{route('order.index')}}">
                    <div class="panel-body">
                        <h1>orders</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel panel-default">
                <a href="{{route('tafel.index')}}">
                    <div class="panel-body">
                        <h1>tafels</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="panel panel-default">
               
            </div>
        </div>

    </div>
{{--</div>--}}
@endsection
