@extends('layouts.kiosk')

@section('content')
    <div class="container">
        <div class="col-lg-3" style="margin-top: 500px;">
            <div class="panel panel-content" id="filter" >
                <div class="panel-body">
                    <div>filter</div>
                    <div>
                        @foreach($menu as $i)
                            <a class="col-md-12 btn btn-default" style="margin-bottom: 3px;">{{$i->naam}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-9">
            @foreach($product as $i)
                <div class="panel panel-content">
                    <div class="panel-body">
                        <h3>asdasdsa</h3>
asdasd

                        {{--{{dd($i->productIngredient())}}--}}
                        @foreach($i->productIngredient as $ingr)
                            Gemaakt met: {{$ingr->ingredient->ingredient}},
                        @endforeach

                    </div>
                </div>
            @endforeach
                @foreach($product as $i)
                    <div class="panel panel-content">
                        <div class="panel-body">
                            <h3>asdasdsa</h3>

                            {{$i}}
                        </div>
                    </div>
                @endforeach
                @foreach($product as $i)
                    <div class="panel panel-content">
                        <div class="panel-body">
                            <h3>asdasdsa</h3>

                            {{$i}}
                        </div>
                    </div>
                @endforeach
                @foreach($product as $i)
                    <div class="panel panel-content">
                        <div class="panel-body">
                            <h3>asdasdsa</h3>

                            {{$i}}
                        </div>
                    </div>
                @endforeach
                @foreach($product as $i)
                    <div class="panel panel-content">
                        <div class="panel-body">
                            <h3>asdasdsa</h3>

                            {{$i}}
                        </div>
                    </div>
                @endforeach
        </div>
    </div>
@endsection

@push('css')
    <style>
        .filter{

        }
        .fix-filter {
            position: fixed;
            top: 10px;
            width: 250px;
        }
    </style>
@endpush
@push('js')
    <script>

//        document.addEventListener('scroll', function (event) {
//            console.log(event.target.id ===  $("#filter"));
//
//            if (event.target.id === '#filter') { // or any other filtering condition
//                console.log('scrolling', event.target);
//            }
//        }, true /*Capture event*/);

        $(document).ready(function() {
            var wrap = $("#filter");

//            console.log(wrap);

//            $("#app").on('scroll', '#filter', function(){
//                console.log('Event Fired');
//            });

            $(window).scroll(function(e) {
                console.log('logging' + this.scrollTop);
            });
            wrap.on("scroll", function(e) {

                console.log(e);

                if (this.scrollTop > 147) {
                    wrap.addClass("fix-filter");
                } else {
                    wrap.removeClass("fix-filter");
                }

            });
        });

    </script>
@endpush
