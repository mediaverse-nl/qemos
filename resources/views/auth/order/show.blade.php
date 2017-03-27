@extends('layouts.orders')

@section('content')
    <style>
        button.active{
            background: #3c763d;
            color: white;
        }
    </style>

<div class="container">
    {{--<div class="col-lg-12">--}}
        <input id="tafel" type="hidden" value="{{$tafels->id}}" />
        <input id="status" type="hidden" value="{{$tafels->bezet}}" />
        {{--<input id="status" type="hidden" value="{{$tafels->status}}" />--}}
    {{--</div>--}}
    {{--<hr>--}}
    {{--{!! Breadcrumbs::render('home') !!}--}}
    {{--<hr>--}}

    <div class="col-lg-2">
        <h1>Menu</h1>
        <div id="menu" class="row">
            @foreach($menus as $menu)
                <div class="col-lg-12">
                    <div class="thumbnail">
                        <button type="button" value="{{$menu->id}}" id="btn-menu" class="btn-menu menu-item-{{$menu->id}}">
                            {{$menu->naam}}
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    <div class="col-lg-5">
        <h1>Producten</h1>
        <div id="product" class="row">

            @foreach($products as $product)
                <button type="button" value="{{$product->id}}" id="btn-add" class="col-lg-6 menu menu-{{$product->menuProduct->menu_id}}">
                    {{--<div class="thumbnail">--}}
                        {{$product->naam}}
                    {{--</div>--}}
                </button>
            @endforeach

            {{--<div class="thumbnail">--}}

        </div>
    </div>
    <div class="col-lg-3">
        {{--<div class="">--}}
        <h1>Bestelling</h1>
        <div id="order" class="thumbnail">

        </div>
        {{--</div>--}}
    </div>

    <div class="col-lg-2">
        <h1> .</h1>
        <div class="row">

            <div class="col-lg-12">
                <div class="thumbnail">
                    verwijderen
                </div>
            </div>
            <div class="col-lg-12">
                <div class="thumbnail">
                    korting
                </div>
            </div>
            <div class="col-lg-12">
                <div class="thumbnail">
                    Splitsen
                </div>
            </div>

            <div class="col-lg-12">
                <div class="thumbnail">
                    Afrekenen
                </div>
            </div>
            <div class="col-lg-12">
                <div class="thumbnail">
                    {{--status veranderen van alle nieuwe bestelde producten --}}
                    @if($tafels->bezet)
                        <button type="button">opslaan</button>
                    @else
                        <button type="button">open</button>
                    @endif
                </div>
            </div>
        </div>
        {{--<div class="thumbnail">--}}
            {{--<ul>--}}
                {{--<li><a href="#">Splitsen</a></li>--}}
                {{--<li><a href="#">Afrekenen</a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    </div>

</div>
@endsection


@push('js')
    <meta name="_token" content="{!! csrf_token() !!}" />

    <script type="text/javascript" src="{{ asset('js/ajax/cart.js') }}"></script>
@endpush

