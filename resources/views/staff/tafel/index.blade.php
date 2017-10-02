@extends('layouts.staff')

@section('content')

    <h1>tafels</h1>
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
                    <th>aantal plaatsen</th>
                    <th>status</th>
                    <th>opties</th>
                </tr>
                </thead>
                <tbody id="tasks-list" name="tasks-list">
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
                            <h4 class="modal-title" id="myModalLabel">Tafel</h4>
                        </div>
                        <div class="modal-body">
                            {{--                    {{Illuminate\Validation\Rule::in(['a'=>'a','c'=>'c'])}}--}}
                            <form id="frmTasks" name="frmTasks" class="" novalidate="">
                                {{Form::hidden('id', null)}}

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

    <script type="text/javascript" src="{{ asset('js/ajax/tafel.js') }}"></script>
@endpush

