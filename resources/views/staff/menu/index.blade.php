@extends('layouts.staff')

@section('content')

    <hr>
    <button id="btn-add" name="btn-add" class="btn btn-default btn-xs">Nieuw</button>
    <hr>
    <div id="successMsg"></div>

    {{--<div id="col-md-6"></div>--}}
    <div class="col-md-6">
        @component('components.table-panel')
            @slot('thead')
                <tr>
                    {{--<th>#</th>--}}
                    <th>naam</th>
                    <th>opties</th>
                </tr>
            @endslot
            @slot('tbody')
                @foreach($menus as $menu)
                    <tr id="task{{$menu->id}}">
                        {{--<td>{{$menu->id}}</td>--}}
                        <td>{{$menu->naam}}</td>
                        <td>
                            <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$menu->id}}">wijzigen</button>
                            <button class="btn btn-danger btn-xs btn-delete delete-task" value="{{$menu->id}}">verwijderen</button>
                        </td>
                    </tr>
                @endforeach
            @endslot
        @endcomponent
    </div>

    @component('components.model-dialog')
        @slot('title')
            Product
        @endslot
        @slot('form')
            {{Form::hidden('id', null, ['class' => 'form-control', 'id' => 'id'])}}

            <div class="form-group error-naam" >
                {{Form::label('naam', 'naam')}}
                {{Form::text('naam', null, ['class' => 'form-control'])}}
                <small id="error-naam" class="error"></small>
            </div>
        @endslot
    @endcomponent


@endsection

@push('js')
        <meta name="_token" content="{!! csrf_token() !!}" />

        <script type="text/javascript" src="{{ asset('js/ajax/menu.js') }}"></script>
@endpush
