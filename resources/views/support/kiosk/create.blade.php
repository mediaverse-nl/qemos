@extends('layouts.support')

@section('content')
    <div class="col-md-6">
        @component('components.content-panel')
            @slot('content')
                {{Form::open( ['route' => ['support.kiosk.store'], 'method' => 'POST'])}}

                <div class="form-group">
                    {{Form::label('location_id', null)}}
                    {{Form::select('location_id', \App\Location::pluck('adres', 'id')->put('null', '---'), 'null', ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('api_key', null)}}
                    {{Form::text('api_key', null, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('model_nr', null)}}
                    {{Form::text('model_nr', null, ['class' => 'form-control'])}}
                </div>
                <div class="form-group">
                    {{Form::label('status', null)}}
                    {{Form::select('status', \App\Location::status(), null, ['class' => 'form-control'])}}
                </div>

                {{Form::submit('save', ['class' => 'btn btn-default'])}}

                {{Form::close()}}

            @endslot
        @endcomponent

    </div>

@endsection
