@extends('layouts.staff')

@section('content')
    <hr>
    <button id="btn-add" name="btn-add" class="btn btn-default btn-xs">Nieuw</button>
    <hr>

    <div class="col-md-12">

        <div class="panel panel-default">
            <div class="panel-body" style="height: 500px;">
                <div class="drop-target">
                    <div class="drag-item" data-table-id="1">1</div>
                    <div class="drag-item" data-table-id="2" style="left:87px;top:87px;">2</div>
                    <p class="text-center" style="position: absolute; margin-bottom: -20px; bottom: 0 !important;">plattegrond: buiten</p>

                </div>
                <div class="outside-drag-item" data-table-id="101">101</div>

            </div>
        </div>

    </div>
    <hr>

    <div class="col-md-12">

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
                        <td>{{$tafel->id}}</td>
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

    @component('components.model-dialog')
        @slot('title')
            tafel
        @endslot
        @slot('form')

            {{Form::hidden('id', null, ['class' => 'form-control', 'id' => 'id'])}}

            <div class="form-group error-aantal_plaatsen" >
                {{Form::label('aantal_plaatsen', 'aantal plaatsen')}}
                {{Form::number('aantal_plaatsen', null, ['class' => 'form-control'])}}
                <small id="error-aantal_plaatsen" class="error"></small>
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
        $(function () {
            $(".drag-item").draggable({
                snap: '.gridlines',
                stop:function(event,ui) {
                    var el = event.target;
                    var po = ui.position;
                    var elId = parseInt(el.getAttribute('data-table-id'));

                    console.log(po.top, po.left, elId);
//                    update to database
                },

                drag: function( event, ui ) {
                    var el = event.target.getAttribute;
                    console.log(el, ui.position.left);
                }
//                greedy: true,
//                tolerance: 'touch',
//                drop: function(event,ui){
//                    ui.draggable.draggable('option','revert',true);
//                    console.log(ui.draggable.draggable('option','revert',true));
//                }
            }, "containment" );
            $(".outside-drag-item").draggable({
                snap: '.gridlines',
                stop:function(event,ui) {
                    var el = event.target;
                    var po = ui.position;
                    var elId = parseInt(el.getAttribute('data-table-id'));

                    console.log(po.top, po.left, elId);
//                    update to database
                }
//                helper: 'clone',
//                appendTo: '.drop-target'
//                ,
//                helper: function (e, ui) {
//                    return $(this).clone(true);
//                }
            }, "containment" );
            $(".drop-target").droppable({
                accept: ".drag-item"
//                ,
//                drop: function (event, ui) {
//                    ui.draggable.clone().appendTo($(this)).draggable();
////                    console.log(2);
//                }

            }, "containment", "parent" );
        });

        function createGrid(size) {
            var i,
                sel = $('.drop-target'),
                height = sel.height(),
                width = sel.width(),
                ratioW = Math.floor(width / size),
                ratioH = Math.floor(height / size);

            for (i = 0; i <= ratioW; i++) { // vertical grid lines
                $('<div />').css({
                    'top': 0,
                    'left': i * size,
                    'width': 1,
                    'height': height
                })
                .addClass('gridlines')
                .appendTo(sel);
            }

            for (i = 0; i <= ratioH; i++) { // horizontal grid lines
                $('<div />').css({
                    'top': i * size,
                    'left': 0,
                    'width': width,
                    'height': 1
                })
                .addClass('gridlines')
                .appendTo(sel);
            }

            $('.gridlines').show();
        }

        createGrid(1);
    </script>

    <meta name="_token" content="{!! csrf_token() !!}" />

    <script type="text/javascript" src="{{ asset('js/ajax/tafel.js') }}"></script>

@endpush

@push('css')
    <style>
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

