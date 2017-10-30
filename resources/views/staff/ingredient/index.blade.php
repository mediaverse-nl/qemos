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
                    <th>#</th>
                    <th>ingredient</th>
                    <th>opties</th>
                </tr>
            @endslot
            @slot('tbody')
                @foreach($ingredients as $ingredient)
                    <tr id="task{{$ingredient->id}}">
                        <td>{{$ingredient->ingredient}}</td>
                        <td>
                            <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$ingredient->id}}">wijzigen</button>
                            <button class="btn btn-danger btn-xs btn-delete delete-task" value="{{$ingredient->id}}">verwijderen</button>
                        </td>
                    </tr>
                @endforeach
            @endslot
        @endcomponent
    </div>

    @component('components.model-dialog')
        @slot('title')
            Ingredient
        @endslot
        @slot('form')

            {{Form::hidden('id', null, ['class' => 'form-control', 'id' => 'id'])}}

            <div class="form-group error-ingredient" >
                {{Form::label('ingredient', 'ingredient')}}
                {{Form::text('ingredient', null, ['class' => 'form-control'])}}
                <small id="error-ingredient" class="error"></small>
            </div>

        @endslot
    @endcomponent

@endsection

@push('js')
        <meta name="_token" content="{!! csrf_token() !!}" />

        <script type="text/javascript" src="{{ asset('js/ajax/ingredient.js') }}"></script>
@endpush
