@extends('layouts.app')

@section('content')

    <h1>product</h1>
    <hr>

    {!! Breadcrumbs::render('home') !!}

    <button id="btn-add" name="btn-add" class="btn btn-default btn-xs">Nieuw</button>

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
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <div>

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
                        {{--<div class="form-group">--}}
                        {{--{{Form::label('id', 'id')}}--}}
                        {{Form::hidden('id', null, ['class' => 'form-control'])}}
                        {{--</div>--}}

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
                            {{Form::select('status', ['verwijdert'=>'verwijdert', 'zichtbaar'=>'zichtbaar', 'verschuilen'=>'verschuilen'], null, ['class' => 'form-control'])}}
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

@endsection

@push('js')
    <script type="text/javascript" src="{{ asset('js/ajax/product.js') }}"></script>
@endpush
