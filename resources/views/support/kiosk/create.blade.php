@extends('layouts.support')

@section('content')

    {{Form::open(['route' => ['support.kiosk.store']])}}

    {{Form::text('location_id', null, ['class' => 'form-control'])}}
    {{Form::text('api_key', null, [])}}
    {{Form::text('model_nr', null, [])}}
    {{Form::text('status', null, [])}}
    {{Form::submit('save', null, ['class' => 'btn btn-default'])}}

    {{Form::close()}}

@endsection
