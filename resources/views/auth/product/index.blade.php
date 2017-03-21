@extends('layouts.app')

@section('content')


    <h1>product</h1>
    <hr>
    {!! Breadcrumbs::render('home') !!}


    <a href="{{route('product.create')}}" class="btn btn-default">Nieuw</a>

    <hr>

    <div class="table-responsive table-bordered">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>bereidingsduur</th>
                    <th>naam</th>
                    <th>prijs</th>
                    <th>status</th>
                    <th>opties</th>
                </tr>
            </thead>
            <tbody id="tasks-list" name="tasks-list">

                {{--{{dd($tafels)}}--}}
                @foreach($products as $product)
                    <tr id="task{{$product->id}}">
                        <td>{{$product->id}}</td>
                        <td>{{$product->bereidingsduur}}</td>
                        <td>{{$product->naam}}</td>
                        <td>{{$product->prijs}}</td>
                        <td>{{$product->status}}</td>
                        <td>
                            <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$product->id}}">wijzigen</button>
                            <button class="btn btn-danger btn-xs btn-delete delete-task" value="{{$product->id}}">verwijderen</button>

                            {{--<a class="btn btn-warning btn-xs" href="{{route('tafel.edit', $product->id)}}">wijzigen</a>--}}
                            {{--<button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal{{$product->id}}">wijzigen</button>--}}

                            <!-- End of Table-to-load-the-data Part -->
                            <!-- Modal (Pop up when detail button clicked) -->

                            <!-- Modal -->
                            {{--<div id="myModal{{$product->id}}" class="modal fade" role="dialog">--}}
                                {{--<div class="modal-dialog">--}}

                                    {{--<!-- Modal content-->--}}
                                    {{--<div class="modal-content">--}}
                                        {{--<div class="modal-header">--}}
                                            {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                                            {{--<h4 class="modal-title">Modal Header</h4>--}}
                                        {{--</div>--}}
                                        {{--<div class="modal-body">--}}

                                            {{--@if (count($errors) > 0)--}}
                                                {{--{{dd($errors)}}--}}
                                                {{--<div class="alert alert-danger">--}}
                                                    {{--<ul>--}}
                                                        {{--@foreach ($errors->all() as $error)--}}
                                                            {{--<li>{{ $error }}</li>--}}
                                                        {{--@endforeach--}}
                                                    {{--</ul>--}}
                                                {{--</div>--}}
                                            {{--@endif--}}

                                            {{--{!! Form::model($product, ['route' => ['product.update', $product->id], 'method' => 'PATCH', 'class' => 'form'])!!}--}}

                                            {{--<div class="form-group">--}}
                                                {{--{{Form::label('bereidingsduur', 'bereidingsduur')}}--}}
                                                {{--{{Form::number('bereidingsduur', null, ['class' => 'form-control'])}}--}}
                                            {{--</div>--}}

                                            {{--<div class="form-group">--}}
                                                {{--{{Form::label('naam', 'naam')}}--}}
                                                {{--{{Form::text('naam', null, ['class' => 'form-control'])}}--}}
                                            {{--</div>--}}

                                            {{--<div class="form-group">--}}
                                                {{--{{Form::label('prijs', 'prijs')}}--}}
                                                {{--{{Form::text('prijs', null, ['class' => 'form-control'])}}--}}
                                            {{--</div>--}}
                                            {{--<div class="form-group">--}}
                                                {{--{{Form::label('beschrijving', 'beschrijving')}}--}}
                                                {{--{{Form::textarea('beschrijving', null, ['class' => 'form-control'])}}--}}
                                            {{--</div>--}}

                                            {{--<div class="form-group">--}}
                                                {{--{{Form::label('status', 'Status')}}--}}
                                                {{--{{Form::select('status', ['asd'], null, ['class' => 'form-control'])}}--}}
                                            {{--</div>--}}

                                            {{--{{Form::submit('Aanmaken', ['class' => 'btn btn-default', 'id' => 'submit'])}}--}}
                                            {{--<a href="{{route('tafel.index')}}" class="btn btn-default">Terug</a>--}}

                                            {{--{!! Form::close() !!}--}}
                                        {{--</div>--}}
                                        {{--<div class="modal-footer">--}}
                                            {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}

                                {{--</div>--}}
                            {{--</div>--}}

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title" id="myModalLabel">Task Editor</h4>
                    </div>
                    <div class="modal-body">
                        <form id="frmTasks" name="frmTasks" class="" novalidate="">

                            <div class="form-group">
                                {{Form::label('bereidingsduur', 'bereidingsduur')}}
                                {{Form::number('bereidingsduur', null, ['class' => 'form-control'])}}
                            </div>

                            <div class="form-group">
                                {{Form::label('naam', 'naam')}}
                                {{Form::text('naam', null, ['class' => 'form-control'])}}
                            </div>

                            <div class="form-group">
                                {{Form::label('prijs', 'prijs')}}
                                {{Form::text('prijs', null, ['class' => 'form-control'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('beschrijving', 'beschrijving')}}
                                {{Form::textarea('beschrijving', null, ['class' => 'form-control'])}}
                            </div>

                            <div class="form-group">
                                {{Form::label('status', 'Status')}}
                                {{Form::select('status', ['asd'], null, ['class' => 'form-control'])}}
                            </div>

                            {{--                                                {{Form::submit('Aanmaken', ['class' => 'btn btn-default', 'id' => 'submit'])}}--}}
                            {{--                                                <a href="{{route('tafel.index')}}" class="btn btn-default">Terug</a>--}}

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                        <input type="hidden" id="row_id" name="row_id" value="0">
                    </div>
                </div>
            </div>
        </div>

    <div>

@endsection

@push('js')
        <meta name="_token" content="{!! csrf_token() !!}" />

    <script>
        {{--$('#myModal{{Session('id')}}').modal('show');--}}

        $(document).ready(function(){

            var url = "/products";

            //display modal form for task editing
            $('.open-modal').click(function(){
                var row_id = $(this).val();

                $.get(url + '/' + row_id, function (data) {
                    //success data
                    console.log(data);
                    $('#row_id').val(data.id);
                    $('#bereidingsduur').val(data.bereidingsduur);
                    $('#naam').val(data.naam);
                    $('#id').val(data.id);
                    $('#prijs').val(data.prijs);
                    $('#beschrijving').val(data.beschrijving);
                    $('#btn-save').val("update");

                    $('#myModal').modal('show');
                })
            });

            //display modal form for creating new task
            $('#btn-add').click(function(){
                $('#btn-save').val("add");
                $('#frmTasks').trigger("reset");
                $('#myModal').modal('show');
            });

            //delete task and remove it from list
            $('.delete-task').click(function(){
                var row_id = $(this).val();

                $.ajax({

                    type: "DELETE",
                    url: url + '/' + row_id,
                    success: function (data) {
                        console.log(data);

                        $("#task" + row_id).remove();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });

            //create new task / update existing task
            $("#btn-save").click(function (e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                e.preventDefault();

                var formData = {
//                    task : $('#task').val(),
//                    description: $('#description').val(),
                    bereidingsduur: $('#bereidingsduur').val(),
                    naam : $('#naam').val(),
                    id : $('#id').val(),
                    prijs : $('#prijs').val(),
                    beschrijving : $('#beschrijving').val(),
                    _token : '{!! csrf_token() !!}',
//                    '_token': token,
                }

                //used to determine the http verb to use [add=POST], [update=PUT]
                var state = $('#btn-save').val();

                var type = "POST"; //for creating new resource
                var row_id = $('#row_id').val();
                var my_url = url;

                if (state == "update"){
                    type = "PUT"; //for updating existing resource
                    my_url += '/' + row_id;
                }

                console.log(formData);

                $.ajax({
                    type: type,
                    url: my_url,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        console.log(data);

                        var task = '<tr id="task' + data.id + '"><td>' + data.id + '</td><td>' + data.task + '</td><td>' + data.description + '</td><td>' + data.created_at + '</td>';
                        task += '<td><button class="btn btn-warning btn-xs btn-detail open-modal" value="' + data.id + '">Edit</button>';
                        task += '<button class="btn btn-danger btn-xs btn-delete delete-task" value="' + data.id + '">Delete</button></td></tr>';

                        if (state == "add"){ //if user added a new record
                            $('#tasks-list').append(task);
                        }else{ //if user updated an existing record

                            $("#task" + row_id).replaceWith( task );
                        }

                        $('#frmTasks').trigger("reset");

                        $('#myModal').modal('hide')
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                });
            });
        });
    </script>
@endpush
