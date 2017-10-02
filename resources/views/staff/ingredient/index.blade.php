@extends('layouts.staff')

@section('content')

    <h1>ingredients</h1>
    <hr>

    <button id="btn-add" name="btn-add" class="btn btn-default btn-xs">Nieuw</button>

    <hr>

    <div id="successMsg"></div>
    <div class="panel panel-content">
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover" style="margin-bottom: 0px !important;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>ingredient</th>
                        <th>opties</th>
                    </tr>
                    </thead>
                    <tbody id="tasks-list" name="tasks-list">
                    @foreach($ingredients as $ingredient)
                        <tr id="task{{$ingredient->id}}">
                            <td>{{$ingredient->id}}</td>
                            <td>{{$ingredient->ingredient}}</td>
                            <td>
                                <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$ingredient->id}}">wijzigen</button>
                                <button class="btn btn-danger btn-xs btn-delete delete-task" value="{{$ingredient->id}}">verwijderen</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div>
        </div>
    </div>



    {{--<hr>--}}

    {{--Model--}}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Product</h4>
                </div>
                <div class="modal-body">
{{--                    {{Illuminate\Validation\Rule::in(['a'=>'a','c'=>'c'])}}--}}
                    <form id="frmTasks" name="frmTasks" class="" novalidate="">
                        {{Form::hidden('id', null, ['class' => 'form-control'])}}

                        <div class="form-group error-ingredient" >
                            {{Form::label('ingredient', 'ingredient')}}
                            {{Form::text('ingredient', null, ['class' => 'form-control'])}}
                            <small id="error-ingredient" class="error"></small>
                        </div>

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
        <meta name="_token" content="{!! csrf_token() !!}" />

        <script type="text/javascript" src="{{ asset('js/ajax/ingredient.js') }}"></script>
@endpush
