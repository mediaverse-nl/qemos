@extends('layouts.staff')

@section('content')

    <button id="btn-add" name="btn-add" class="btn btn-default btn-xs">Nieuw</button>

    <hr>

    <div id="successMsg"></div>

    @component('components.table-panel')
        @slot('thead')
            <tr>
                <th>#</th>
                <th>bereidingsduur</th>
                <th>naam</th>
                <th>prijs</th>
                <th>status</th>
                <th>opties</th>
            </tr>
        @endslot
        @slot('tbody')
            @foreach($users as $product)
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
        @endslot
    @endcomponent

    {{--<hr>--}}

    {{--Model--}}
    @component('components.model-dialog')
        @slot('form')

            {{Form::hidden('id', null, ['class' => 'form-control'])}}
            <div class="form-group error-naam" >
                {{Form::label('naam', 'naam')}}
                {{Form::text('naam', null, ['class' => 'form-control'])}}
                <small id="error-naam" class="error"></small>
            </div>

            <div class="row">
                <div class="col-lg-4">
                    <div class="form-group error-status">
                        {{Form::label('status', 'Status')}}
                        {{Form::select('status', \App\Product::status(), null, ['class' => 'form-control'])}}
                        <small id="error-status" class="error"></small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group error-bezonderheden">
                        {{Form::label('bezonderheden', 'bezonderheden')}}
                        {{Form::select('bezonderheden', \App\Product::bezonderheden()->push('---', null), 0, ['class' => 'form-control'])}}
                        <small id="error-bezonderheden" class="error"></small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group error-Menu">
                        {{Form::label('menu', 'Menu')}}
                        {{Form::select('menu', collect(\App\Menu::all())->pluck('naam', 'id'), null, ['class' => 'form-control'])}}
                        <small id="error-Menu" class="error"></small>
                    </div>
                </div>
            </div>

            <div class="form-group error-beschrijving">
                {{Form::label('beschrijving', 'beschrijving')}}
                {{Form::textarea('beschrijving', null, ['class' => 'form-control', 'rows' => '3'])}}
                <small id="error-beschrijving" class="error"></small>
            </div>

        @endslot
    @endcomponent

@endsection

@push('js')
    <meta name="_token" content="{!! csrf_token() !!}" />

    <script type="text/javascript" src="{{ asset('js/ajax/user.js') }}"></script>
@endpush
