@extends('layouts.kiosk')

@section('content')
    <div class="container">

      {{--@php--}}
          {{--$directory = "qemos/image/*/";--}}

        {{--//get all image files with a .jpg extension.--}}
        {{--$images = glob("" . $directory . "*.jpg");--}}

        {{--$imgs = '';--}}
        {{--// create array--}}
        {{--foreach($images as $image){ $imgs[] = "$image"; }--}}

        {{--//shuffle array--}}
        {{--shuffle($imgs);--}}

        {{--//select first 20 images in randomized array--}}
        {{--$imgs = array_slice($imgs, 0, 1);--}}

      {{--@endphp--}}


        <div class="col-sm-3" style="margin-top: 0px;">
            <div class="affix" style="width: 220px;">
                <div class="panel panel-content" id="">
                    <div class="panel-body">
                        {{--<div>filter</div>--}}
                        <div>
                            <ul>
                                <h2 style=" font: 400 40px/1.5 Helvetica, Verdana, sans-serif;">Menu</h2>
                                @foreach($menu as $i)
                                    <li >
                                        <a class="" style="margin-bottom: 3px;">{{$i->naam}}</a>
                                    </li>
                                @endforeach
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-9">
            @foreach($menu as $i)

                <div class="row">
                    <div class="col-sm-12">

                        <div class="panel panel-body menu-cate" style="margin-bottom: -30px; border-radius: 5px; border: none;">
                            <div class="panel-body">
                                {{--<img src="https://dummyimage.com/1000x200/000/fff">--}}
                                <h1 style="color: #FFFFFF">{{$i->naam}}</h1>
                                {{--<h1>{{$i->naam}}</h1>--}}
                                {{--<hr>--}}
                            </div>
                        </div>
                    </div>

                        {{--{{$i}}--}}
                </div>

                @foreach($i->menuProduct as $m)
                    <div class="col-sm-12">
                        {{--{{$m}}--}}
                        <div class="panel panel-content" style="background: #FFFFFF;">
                            <div class="panel-body">
                                <div class="col-md-3">
                                    <img src="/qemos/image/{{$m->menu->id}}/{{rand(1, 4)}}.jpg" class="img-responsive center-block"  style="height: 130px;">
                                </div>
                                <div class="col-md-6">
                                    <h3>{{$m->product->naam}}</h3>
{{--                                    <h3>{{$m->product->menuProduct->menu->naam}}</h3>--}}
                                    {{--{{dd($i->productIngredient())}}--}}
                                    Gemaakt met:
                                    @foreach($m->product->productIngredient as $ingr)
                                        {{$ingr->ingredient->ingredient}},
                                    @endforeach
                                </div>
                                <div class="col-md-3">
                                    <br>
                                    <br>
                                    <br>
                                    <a href="" class="btn btn-primary pull-right">
                                        <span>
                                            <i class="fa fa-eur" aria-hidden="true"></i>
                                            {{$m->product->prijs}}
                                        </span> |
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            @endforeach

        </div>

        <div class="col-md-9 pull-right" >
            <div class="panel panel-body">
                <div class="panel-body">
                    <h1>Winkelwagen</h1>

                    <div class="col-sm-12" style="margin-bottom: 30px;">
                        <table class="table">
                            <tr>
                                <td>1x</td>
                                <td>big burger special
                                    <i class="fa fa-pencil" aria-hidden="true" style="font-size: 18px !important;"></i>
                                    <br>rund, Gemaakt met: tomaat,</td>
                                <td>
                                    <i class="fa fa-trash" aria-hidden="true" style="margin-right: 50px;font-size: 18px !important;"></i>
                                    <i class="fa fa-minus pull-right" aria-hidden="true" style="font-size: 18px !important;"></i>
                                    <i class="fa fa-plus pull-right" aria-hidden="true" style="font-size: 18px !important;"></i>
                                </td>
                                <td><span class="pull-right">&#8364; 10,00 <small class="muted">incl btw</small></span></td>
                            </tr>
                            <tr>
                                <td>1x</td>
                                <td>Tomate soep
                                    <i class="fa fa-pencil" aria-hidden="true" style="font-size: 18px !important;"></i>
                                    <br>rund, tomaat, ui</td>
                                <td>
                                    <i class="fa fa-trash" aria-hidden="true" style="margin-right: 50px;font-size: 18px !important;"></i>
                                    <i class="fa fa-minus pull-right" aria-hidden="true" style="font-size: 18px !important;"></i>
                                    <i class="fa fa-plus pull-right" aria-hidden="true" style="font-size: 18px !important;"></i>
                                </td>
                                <td><span class="pull-right">&#8364; 3 <small class="muted">incl btw</small></span></td>
                            </tr>
                            <tr>
                                <td>2x</td>
                                <td>Spa Rood
                                    {{--<i class="fa fa-pencil" aria-hidden="true" style="font-size: 18px !important;"></i>--}}
                                    {{--<br>rund, tomaat, ui</td>--}}
                                <td>
                                    <i class="fa fa-trash" aria-hidden="true" style="margin-right: 50px;font-size: 18px !important;"></i>
                                    <i class="fa fa-minus pull-right" aria-hidden="true" style="font-size: 18px !important;"></i>
                                    <i class="fa fa-plus pull-right" aria-hidden="true" style="font-size: 18px !important;"></i>
                                </td>
                                <td><span class="pull-right">&#8364; 2 <small class="muted">incl btw</small></span></td>
                            </tr>
                        </table>
                    </div>

                    <br>
                    <br>

                    <div class="col-md-6">
                        <style>
                            table th{
                                font-size: 20px !important;
                            }
                        </style>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="font-size: 20px;">Subtotal</th>
                                    <td><b style="font-size: 20px;">&#8364; 15,00</b></td>
                                </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th style="font-size: 15px;">Btw <span></span></th>
                                <td>&#8364; 3,15</td>
                            </tr>
                            {{--<tr>--}}
                                {{--<th style="font-size: 15px;">Btw <span></span></th>--}}
                                {{--<td>b</td>--}}
                            {{--</tr>--}}
                            </tbody>
                        </table>
                    </div>
                    {{--<hr>--}}
                    <a class="btn btn-danger btn-lg col-md-6" style="margin-bottom: 10px;">Annuleren</a>

                    <a class="btn btn-success  btn-lg col-md-6">Betalen</a>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('css')
    <style>
        .menu-cate{
            background-image: url('/qemos/image/banner.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.8;
            /*background: #000000;*/
        }
        .filter{

        }
        .fix-filter {
            position: fixed;
            top: 10px;
            /*width: 250px;*/
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        li {
            font: 200 20px/1.5 Helvetica, Verdana, sans-serif;
            border-bottom: 1px solid #ccc;
        }

        li:last-child {
            border: none;
        }

        li a {
            text-decoration: none;
            color: #000;
            display: block;
            /*width: 200px;*/

            -webkit-transition: font-size 0.3s ease, background-color 0.3s ease;
            -moz-transition: font-size 0.3s ease, background-color 0.3s ease;
            -o-transition: font-size 0.3s ease, background-color 0.3s ease;
            -ms-transition: font-size 0.3s ease, background-color 0.3s ease;
            transition: font-size 0.3s ease, background-color 0.3s ease;
        }

        li a:hover {
            font-size: 30px;
            background: #f6f6f6;
        }
    </style>
@endpush
@push('js')
    <script>

        $(document).ready(function (){
            $("#cart").click(function (){
//                $(window).load(function() {
                $("html, body").animate({ scrollTop: $(document).height() }, 1000);
//                });
            });
        });

//        $(window).scroll(function () {
//            if ($(this).scrollTop() > 100) {
//                $('.scrollToTop').fadeIn();
//            } else {
//                $('.scrollToTop').fadeOut();
//            }
//        });
//        document.addEventListener('scroll', function (event) {
//            console.log(event.target.id ===  $("#filter"));
//
//            if (event.target.id === '#filter') { // or any other filtering condition
//                console.log('scrolling', event.target);
//            }
//        }, true /*Capture event*/);
//
//        $(document).ready(function() {
//            var wrap = $("#filter");
//
////            console.log(wrap);
//
////            $("#app").on('scroll', '#filter', function(){
////                console.log('Event Fired');
////            });
//
//            $(window).scroll(function () {
//                console.log('logging ' + $(this).scrollTop());
//            });
//            wrap.on("scroll", function(e) {
//
//                console.log(e);
//
//                if ($(this).scrollTop() > 147) {
//                    wrap.addClass("fix-filter");
//                } else {
//                    wrap.removeClass("fix-filter");
//                }
//
//            });
//        });

    </script>
@endpush
