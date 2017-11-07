@extends('layouts.staff')

@section('content')
    <hr>
    <button id="btn-add" name="btn-add" class="btn btn-default btn-xs">Nieuw</button>
    <hr>

    {{--<div class="col-md-6">--}}

        {{--<div class="panel panel-default">--}}
            {{--<div class="panel-body" style="height: 500px;">--}}
                {{--<div class="drop-target">--}}

                    {{--<div class="drag-item" data-table-id="2" style="left:87px;top:87px;">2</div>--}}
                    {{--<p class="text-center" style="position: absolute; margin-bottom: -20px; bottom: 0 !important;">plattegrond: buiten</p>--}}

                {{--</div>--}}
                {{--<div class="outside-drag-item" data-table-id="101">101</div>--}}

            {{--</div>--}}
        {{--</div>--}}

    {{--</div>--}}

    <div class="row">
        <div class="col-md-6">

            <div class="panel panel-default">
                <div class="panel-body" style="height: 500px;">
                    <div id="drop" class="drop">
                        @foreach($tafels as $t)
                            <div class="drag" data-table-id="{{$t->id}}" style="
                                position: relative;
                                width: 30px;
                                right: auto;
                                height: 30px;
                                bottom: auto;
                                top: {{$t->x}}px;
                                left: {{$t->y}}px;
                            ">{{$t->tafel_nr}}</div>
                        @endforeach
                    </div>
                    <div class="drag"></div>


                </div>
            </div>

        </div>

        <div class="col-md-6">

            @component('components.table-panel')
                @slot('thead')
                    <tr>
                        <th>#</th>
                        <th>aantal plaatsen</th>
                        <th>status</th>
                        <th>opties</th>
                    </tr>
                @endslot
                @slot('tbody')
                    @foreach($tafels as $tafel)
                        <tr id="task{{$tafel->id}}">
                            <td>{{$tafel->tafel_nr}}</td>
                            <td>{{$tafel->aantal_plaatsen}}</td>
                            <td>{{$tafel->status}}</td>
                            <td>
                                <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$tafel->id}}">wijzigen</button>
                                <button class="btn btn-danger btn-xs btn-delete delete-task" value="{{$tafel->id}}">verwijderen</button>
                            </td>
                        </tr>
                    @endforeach
                @endslot
            @endcomponent
        </div>
    </div>

    @component('components.model-dialog')
        @slot('title')
            tafel
        @endslot
        @slot('form')

            {{Form::hidden('id', null, ['class' => 'form-control', 'id' => 'id'])}}

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group error-aantal_plaatsen" >
                        {{Form::label('aantal_plaatsen', 'aantal plaatsen')}}
                        {{Form::number('aantal_plaatsen', null, ['class' => 'form-control'])}}
                        <small id="error-aantal_plaatsen" class="error"></small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group error-tafel_nr" >
                        {{Form::label('tafel_nr', 'tafel nr')}}
                        {{Form::number('tafel_nr', null, ['class' => 'form-control'])}}
                        <small id="error-tafel_nr" class="error"></small>
                    </div>
                </div>

                {{--<div class="col-md-3">--}}
                    {{--<div class="form-group error-x" >--}}
                        {{--{{Form::label('x', 'x')}} <i class='fa fa-long-arrow-up' aria-hidden='true'></i>--}}
                        {{--{{Form::number('x', null, ['class' => 'form-control'])}}--}}
                        {{--<small id="error-x" class="error"></small>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-3">--}}
                    {{--<div class="form-group error-y" >--}}
                        {{--{{Form::label('y', 'y')}} <i class="fa fa-long-arrow-right" aria-hidden="true"></i>--}}
                        {{--{{Form::number('y', null, ['class' => 'form-control'])}}--}}
                        {{--<small id="error-y" class="error"></small>--}}
                    {{--</div>--}}
                {{--</div>--}}

                {{--<div class="col-md-3">--}}
                    {{--<div class="form-group error-height" >--}}
                        {{--{{Form::label('height', "height")}} <i class='fa fa-long-arrow-up' aria-hidden='true'></i>--}}
                        {{--{{Form::number('height', null, ['class' => 'form-control'])}}--}}
                        {{--<small id="error-height" class="error"></small>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="col-md-3">--}}
                    {{--<div class="form-group error-width" >--}}
                        {{--{{Form::label('width', 'width')}} <i class="fa fa-long-arrow-right" aria-hidden="true"></i>--}}
                        {{--{{Form::number('width', null, ['class' => 'form-control'])}}--}}
                        {{--<small id="error-width" class="error"></small>--}}
                    {{--</div>--}}
                {{--</div>--}}

            </div>












            <div class="form-group error-status" >
                {{Form::label('status', 'status')}}
                {{Form::select('status', \App\Tafel::status(), null, ['class' => 'form-control'])}}
                <small id="error-status" class="error"></small>
            </div>

        @endslot

    @endcomponent

@endsection

@push('js')
    <script>

        function setPosition(id, x, y, h, w) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });

            var my_url = "{!! route('staff.tafel.position') !!}/" + id;

            $.ajax({
                type: "PATCH",
                url: my_url,
                data: {'x':x,'y':y,'h':h,'w':w},
                dataType: 'json',
                success: function (data) {
                    console.log('updated record');
                },
                error: function (data) {
                    console.log(data);
                }
            });
        };

        $('.drop').droppable({
            tolerance: 'fit',
            accept: function (e, u) {
                console.log('special dalivery' , e, u)
            },

        });

        $('.drag').draggable({
            revert: 'invalid',
            accept: function (e, u) {
                console.log('special dalivery' , e, u)
            },
            stop: function(event,ui){
                var el = event.target;
                var po = ui.position;
                var elId = parseInt(el.getAttribute('data-table-id'));

//                console.log(po.top, po.left, elId);
                $(this).draggable('option','revert','invalid');

                setPosition(elId, po.top, po.left, 2, 2);

            }
        });

//        $('.drag').droppable({
//            greedy: true,
//            tolerance: 'touch',
//            drop: function(event,ui){
//                var el = event.target;
//                var po = ui.position;
//                var elId = parseInt(el.getAttribute('data-table-id'));
//
//                ui.draggable.draggable('option','revert',true);
//
//                setPosition(elId, po.top, po.left, 2, 2);
//            },
//            containment: "#drop"
//        });
//
//        $(function () {
//            $(".drag-item").draggable({
//                snap: '.gridlines',
//                revert: 'invalid',
//                stop:function(event,ui) {
//                    var el = event.target;
//                    var po = ui.position;
//                    var elId = parseInt(el.getAttribute('data-table-id'));
//
//                    $(this).draggable('option','revert','invalid');
//
//                    console.log(po.top, po.left, elId);
////                    update to database
//                },
//                drag: function( event, ui ) {
//                    var el = event.target;
//                    console.log(el, ui.position.left);
//                },
//                greedy: true,
//                drop: function(event,ui){
//
//                    console.log(event, ui);
//
//                    ui.draggable.draggable('option','revert',true);
//                }
//            });
//            $(".outside-drag-item").draggable({
//                snap: '.gridlines',
//                stop:function(event,ui) {
//                    var el = event.target;
//                    var po = ui.position;
//                    var elId = parseInt(el.getAttribute('data-table-id'));
//
//                    console.log(po.top, po.left, elId);
////                    update to database
//                }
//            });
//            $(".drop-target").droppable({
//                accept: ".drag-item"
//            });
//        });

//        function createGrid(size) {
//            var i,
//                sel = $('.drop-target'),
//                height = sel.height(),
//                width = sel.width(),
//                ratioW = Math.floor(width / size),
//                ratioH = Math.floor(height / size);
//
//            for (i = 0; i <= ratioW; i++) { // vertical grid lines
//                $('<div />').css({
//                    'top': 0,
//                    'left': i * size,
//                    'width': 1,
//                    'height': height
//                })
//                .addClass('gridlines')
//                .appendTo(sel);
//            }
//
//            for (i = 0; i <= ratioH; i++) { // horizontal grid lines
//                $('<div />').css({
//                    'top': i * size,
//                    'left': 0,
//                    'width': width,
//                    'height': 1
//                })
//                .addClass('gridlines')
//                .appendTo(sel);
//            }
//
//            $('.gridlines').show();
//        }

//        createGrid(1);
    </script>

    <meta name="_token" content="{!! csrf_token() !!}" />

    <script type="text/javascript" src="{{ asset('js/ajax/tafel.js') }}"></script>

@endpush

@push('css')
    <style>
        .drop { display:inline-block; width:300px; height:200px; border:1px solid silver; background-color:whitesmoke; padding:10px; }

        .drag { display:inline-block; width:30px; height:30px; border:1px solid silver; background-color:white; }



        .gridlines {
            display: none;
            position:absolute;
            background-color:#ccc;
        }
        .drag-item, .outside-drag-item {
            position:absolute;
            z-index: 999;
            background:red;
            width:30px;
            height:30px;
            cursor:move;
        }
        .drop-target {
            position:absolute;
            left:100px;
            top:100px;
            width:300px;
            height:300px;
            border:dashed 1px orange;
        }
    </style>
@endpush

