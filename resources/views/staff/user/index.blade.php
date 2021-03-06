@extends('layouts.staff')

@section('content')

    <hr>

    <div id="successMsg"></div>

    <div class="row">
        <div class="col-md-6">
            @component('components.table-panel')
                @slot('thead')
                    <tr>
                        {{--<th>#</th>--}}
                        <th>naam</th>
                        <th>email</th>
                        {{--<th>locatie</th>--}}
                        <th>role</th>
                        <th>status</th>
                        <th class="no-sort">opties</th>
                    </tr>
                @endslot
                @slot('tbody')
                    @foreach($users as $user)
                        <tr id="task{{$user->id}}">
                            {{--<td>{{$user->id}}</td>--}}
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @foreach($user->userRole->pluck('role.role')->unique() as $item)
                                    <small class="badge">{{$item}}</small>
                                @endforeach
                            </td>
                            <td>{{$user->confirmed ? 'activated':'unactivated'}}</td>
                            {{--<td>{{$user->status}}</td>--}}
                            <td>
                                <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$user->id}}">
                                    <i class="fa fa-pencil" aria-hidden="true" title="wijzigen"></i>
                                </button>
                                <button class="btn btn-danger btn-xs btn-delete delete-task" value="{{$user->id}}">
                                    <i class="fa fa-trash" aria-hidden="true" title="verwijderen"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endslot
            @endcomponent
        </div>

        <div class="col-md-6">
            @component('components.content-panel-heading')
                @slot('heading')
                    nieuwe gebruiker toevoegen
                @endslot
                @slot('content')
                    {{Form::model(['route' => 'staff.user.store', 'class' => 'form-control', 'method' => 'POST'])}}

                    <div class="form-group error-name" >
                        {{Form::label('name', 'name')}}
                        {{Form::text('name', null, ['class' => 'form-control'])}}
                        @include('components.input-error-msg', ['name' => 'name'])
                    </div>

                    <div class="form-group error-email" >
                        {{Form::label('email', 'email')}}
                        {{Form::text('email', null, ['class' => 'form-control'])}}
                        @include('components.input-error-msg', ['name' => 'email'])
                    </div>

                    <div class="form-group error-roles">
                        {!! Form::label('roles', 'roles') !!}<br>
                        <div class="row roles">
                            @foreach(array_except($roles, [0]) as $role)
                                <div class="col-lg-4" style="margin-bottom: 10px;">
                                    {{--{{$ingredient}}--}}
                                    {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'roles'.$role->role.' role']) !!}
                                    {!! Form::label('roles', $role->role) !!}
                                </div>
                            @endforeach
                        </div>
                        {!! Form::submit('save', ['class' => 'btn btn-primary pull-right']) !!}<br>

                    </div>
                    {{Form::close()}}

                @endslot
            @endcomponent
        </div>
    </div>

    {{--Model--}}
    {{--@component('components.model-dialog')--}}
        {{--@slot('title')--}}
            {{--User--}}
        {{--@endslot--}}
        {{--@slot('form')--}}
            {{--{{Form::model(['route' => 'staff.user.store', 'class' => 'form-control', 'method' => 'POST'])}}--}}

            {{--{{Form::hidden('id', null, ['class' => 'form-control'])}}--}}
            {{--<div class="form-group error-naam" >--}}
                {{--{{Form::label('name', 'name')}}--}}
                {{--{{Form::text('name', null, ['class' => 'form-control'])}}--}}
                {{--<small id="error-naam" class="error"></small>--}}
            {{--</div>--}}

            {{--<div class="form-group error-email" >--}}
                {{--{{Form::label('email', 'email')}}--}}
                {{--{{Form::text('email', null, ['class' => 'form-control'])}}--}}
                {{--<small id="error-email" class="error"></small>--}}
            {{--</div>--}}

            {{--<div class="form-group error-roles">--}}
                {{--{!! Form::label('roles', 'roles') !!}<br>--}}
                {{--<div class="row roles">--}}
                    {{--@foreach(array_except($roles, [0]) as $role)--}}
                        {{--<div class="col-lg-4" style="margin-bottom: 10px;">--}}
                            {{--{{$ingredient}}--}}
                            {{--{!! Form::checkbox('roles[]', $role->id, null, ['class' => 'roles'.$role->role.' role']) !!}--}}
                            {{--{!! Form::label('roles', $role->role) !!}--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
                {{--{!! Form::submit('roles') !!}<br>--}}

            {{--</div>--}}
            {{--{{Form::close()}}--}}

        {{--@endslot--}}
    {{--@endcomponent--}}

    <style>
        .toolbar{
            float: left;
        }
    </style>
@endsection

@push('js')
    <meta name="_token" content="{!! csrf_token() !!}" />

    <script>
        $(document).ready(function() {
//            test = $('#example').DataTable();

            $.fn.dataTableExt.oStdClasses.sPageButton = "table-pagination-btn";

            $('#table').DataTable({
                // ... skipped ...
//                dom: 'l<"dataTables_length">frtip',
                initComplete: function(){
                    $("div.dataTables_length").html(
                        '<a class="btn btn-xs btn-default btn-success" title="aanmaken"><i class="fa fa-plus" aria-hidden="true"></i></a>'
                    );
                }
            });

        });
    </script>

    <script type="text/javascript" src="{{ asset('js/ajax/user.js') }}"></script>
@endpush
