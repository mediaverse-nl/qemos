@extends('layouts.support')

@section('content')

    {!! Form::open(['route' => ['support.location.store'], 'method' => 'patch', 'class' => 'form-horizontal']) !!}

    <div class="form-group {{ $errors->has('company_name') ? 'has-error' : ''}}">
        <label class="control-label col-sm-3" for="company_name">company_name:</label>
        <div class="col-sm-9">
            {{Form::text('company_name', null ,['class' => 'form-control', 'rows' => '3'])}}
            @include('components.input-error-msg', ['name' => 'company'])
        </div>
    </div>

    {{Form::text('adres', null, ['class' => 'form-control'])}}
    {{Form::text('postcode', null, [])}}
    {{Form::text('stad', null, [])}}
    {{Form::text('btw', null, [])}}
    {{Form::text('kvk', null, [])}}
    {{Form::text('status', null, [])}}
    {{Form::submit('save', null, ['class' => 'btn btn-default'])}}

    {{Form::close()}}

@endsection
