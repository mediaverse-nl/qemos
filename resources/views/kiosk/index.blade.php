@extends('layouts.kiosk')

@section('content')
<div class="container">

    <div class="row">

        <div class="col-lg-6">
            <div class="panel panel-content">
                <a href="{{route('kiosk.order.index')}}">
                    <div class="panel-body">
                        <h1 class="text-center">Bestellen</h1>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-content">
                <a href="{{route('kiosk.booking.index')}}">
                    <div class="panel-body">
                        <h1 class="text-center">Reserveren</h1>
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
