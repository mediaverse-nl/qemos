@extends('layouts.orders')

@section('content')
    <style>
        button.active{
            background: #3c763d;
            color: white;
        }
    </style>

    <div id="ajax-loader" style="display:none; height: 100%; width: 100%; background: #333333; z-index:9999; opacity: 0.5; position:fixed; top: 0; ">
        <img src="/image/ajax_loader_gray_32.gif" id="loader" style="width: 30px; position:fixed;z-index:9999;top:48%;left:48%;">
    </div>

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
                        <button type="button" id="btn-save" value="">verwijderen</button>
                    </div>
                    <div class="thumbnail">
                        <button type="button" id="btn-save" value="">korting</button>
                    </div>
                    <div class="thumbnail">
                        <button type="button" id="btn-save" value="">Splitsen</button>
                    </div>
                    <div class="thumbnail">
                        <button type="button" id="btn-save" value="">Afrekenen</button>
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

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btn-delete">delete</button>
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

