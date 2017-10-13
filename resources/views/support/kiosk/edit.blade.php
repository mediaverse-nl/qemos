@extends('layouts.support')

@section('content')
    <div class="col-md-6">
        @component('components.content-panel')
            @slot('content')
                {{Form::model($kiosk, ['route' => ['support.kiosk.update', $kiosk->id], 'method' => 'PATCH'])}}

                <div class="form-group">
                    {{Form::label('location_id', null)}}
                    {{Form::select('location_id', \App\Location::pluck('adres', 'id')->put('null', '---'), $kiosk->location_id == null ? 'null' : $kiosk->location_id  , ['class' => 'form-control'])}}
                    @include('components.input-error-msg', ['name' => 'adres'])
                </div>

                <div class="form-group">
                    {{Form::label('api_key', null)}}
                    {{Form::text('api_key', null, ['class' => 'form-control'])}}
                    @include('components.input-error-msg', ['name' => 'api_key'])
                </div>
                <div class="form-group">
                    {{Form::label('model_nr', null)}}
                    {{Form::text('model_nr', null, ['class' => 'form-control'])}}
                    @include('components.input-error-msg', ['name' => 'model_nr'])
                </div>
                <div class="form-group">
                    {{Form::label('status', null)}}
                    {{Form::select('status', \App\Location::status(), null, ['class' => 'form-control'])}}
                    @include('components.input-error-msg', ['name' => 'status'])
                </div>

                {{Form::submit('save', ['class' => 'btn btn-default'])}}

                {{Form::close()}}

            @endslot
        @endcomponent

    </div>

@endsection
