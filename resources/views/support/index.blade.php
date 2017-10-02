@extends('layouts.support')

@section('content')
    <br>

    <div class="col-lg-2">
        <div class="panel panel-content">
            <a href="{{route('support.kiosk.index')}}">
                <div class="panel-body">
                    <h1 class="text-center">kiosk</h1>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-2">
        <div class="panel panel-content">
            <a href="{{route('support.location.index')}}">
                <div class="panel-body">
                    <h1 class="text-center">location</h1>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-2">
        <div class="panel panel-content">
            <a href="{{route('support.pin.index')}}">
                <div class="panel-body">
                    <h1 class="text-center">pin</h1>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-2">
        <div class="panel panel-content">
            <a href="{{route('support.ticket.index')}}">
                <div class="panel-body">
                    <h1 class="text-center">ticket</h1>
                </div>
            </a>
        </div>
    </div>

@endsection
