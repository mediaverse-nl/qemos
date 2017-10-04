@extends('layouts.support')

@section('content')

    @component('components.content-panel')
        @slot('content')
            {!! Form::open(['route' => ['support.location.store'], 'method' => 'post', 'class' => 'form-horizontal']) !!}

            <div class="form-group {{ $errors->has('adres') ? 'has-error' : ''}}">
                <label class="control-label col-sm-3" for="adres">adres:</label>
                <div class="col-sm-9">
                    {{Form::text('adres', null ,['class' => 'form-control', 'rows' => '3'])}}
                    @include('components.input-error-msg', ['name' => 'adres'])
                </div>
            </div>

            <div class="form-group {{ $errors->has('postcode') ? 'has-error' : ''}}">
                <label class="control-label col-sm-3" for="postcode">postcode:</label>
                <div class="col-sm-9">
                    {{Form::text('postcode', null ,['class' => 'form-control', 'rows' => '3'])}}
                    @include('components.input-error-msg', ['name' => 'postcode'])
                </div>
            </div>

            <div class="form-group {{ $errors->has('lang') ? 'has-error' : ''}}">
                <label class="control-label col-sm-3" for="postcode">lang:</label>
                <div class="col-sm-9">
                    {{Form::text('lang', null ,['class' => 'form-control', 'rows' => '3'])}}
                    @include('components.input-error-msg', ['name' => 'lang'])
                </div>
            </div>

            <div class="form-group {{ $errors->has('stad') ? 'has-error' : ''}}">
                <label class="control-label col-sm-3" for="stad">stad:</label>
                <div class="col-sm-9">
                    {{Form::text('stad', null ,['class' => 'form-control', 'rows' => '3'])}}
                    @include('components.input-error-msg', ['name' => 'stad'])
                </div>
            </div>

            <div class="form-group {{ $errors->has('btw') ? 'has-error' : ''}}">
                <label class="control-label col-sm-3" for="btw">btw:</label>
                <div class="col-sm-9">
                    {{Form::text('btw', null ,['class' => 'form-control', 'rows' => '3'])}}
                    @include('components.input-error-msg', ['name' => 'btw'])
                </div>
            </div>

            <div class="form-group {{ $errors->has('kvk') ? 'has-error' : ''}}">
                <label class="control-label col-sm-3" for="kvk">kvk:</label>
                <div class="col-sm-9">
                    {{Form::text('kvk', null ,['class' => 'form-control', 'rows' => '3'])}}
                    @include('components.input-error-msg', ['name' => 'kvk'])
                </div>
            </div>

            <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
                <label class="control-label col-sm-3" for="status">status:</label>
                <div class="col-sm-9">
                    {{Form::text('status', null ,['class' => 'form-control', 'rows' => '3'])}}
                    @include('components.input-error-msg', ['name' => 'status'])
                </div>
            </div>

            {{Form::submit('submit', ['class' => 'btn btn-default pull-right'])}}

            {{Form::close()}}
        @endslot
    @endcomponent

@endsection
