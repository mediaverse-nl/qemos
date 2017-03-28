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
        @if($tafels->orders()->exists())
            <input id="order_id" type="hidden" value="{{$tafels->orders()->where('status', 'open')->first()->id}}" />
        @endif
        {{--<input id="status" type="hidden" value="{{$tafels->status}}" />--}}
    {{--</div>--}}
    {{--<hr>--}}
    {!! Breadcrumbs::render('home') !!}
    {{--<hr>--}}

    <div class="row">
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
                <div class="col-lg-12">
                    @foreach($products as $product)
                        <button type="button" value="{{$product->id}}" id="btn-add" class="col-lg-6 menu menu-{{$product->menuProduct->menu_id}}">
                            {{--<div class="thumbnail">--}}
                                {{$product->naam}}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <h1>Bestelling</h1>
            <div id="order">

            </div>
        </div>

        <div class="col-lg-2">
            <h1></h1>
            <div class="row" id="option">

                <div class="col-lg-12">
                    <div class="thumbnail">
                        <button type="button" id="btn-save" value="{{$tafels->id}}">verwijderen</button>
                    </div>
                    <div class="thumbnail">
                        <button type="button" id="btn-save" value="{{$tafels->id}}">korting</button>
                    </div>
                    <div class="thumbnail">
                        <button type="button" id="btn-save" value="{{$tafels->id}}">Splitsen</button>
                    </div>
                    <div class="thumbnail">
                        <button type="button" id="btn-save" value="{{$tafels->id}}">Afrekenen</button>
                    </div>
                    <div class="thumbnail">
                         <button type="button" id="btn-save" value="{{$tafels->id}}">Opslaan</button>
                    </div>
                </div>

            </div>
        </div>
        {{--end of row--}}
    </div>
    {{--end of container--}}

<!-- Modal -->
    <div class="modal fade" id="my-ingredients" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="product-naam">Anders</h4>
                    <input type="hidden" id="ordered-item" value="">
                </div>
                <div class="modal-body">

                    {{--<div class="form-control">--}}
                        {{--<label></label>--}}
                        {{--<input type="" />--}}
                    {{--</div>--}}

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-add">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection


@push('js')
    <meta name="_token" content="{!! csrf_token() !!}" />

    <script type="text/javascript" src="{{ asset('js/ajax/cart.js') }}"></script>
@endpush

