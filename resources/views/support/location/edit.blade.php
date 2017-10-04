@extends('layouts.support')

@section('content')

    @component('components.content-panel')
        @slot('content')
            {!! Form::model($location, ['route' => ['support.location.update', $location->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}

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

    <div class="row">
        @foreach($location->whitelist as $item)
            <div class="col-md-3">
                @component('components.content-panel')
                    @slot('content')
                        <div class="form-group {{ $errors->has('adres') ? 'has-error' : ''}}">
                            <label class="control-label col-sm-3" for="adres">ip:</label>
                            {{Form::text('ip_address', $item->ip_address,['class' => 'form-control', 'disabled', 'placeholder' => '00.00.00.100'])}}
                            {{--<label class="control-label col-sm-3" for="adres">status:</label>--}}
                            {{--{{Form::text('status', null ,['class' => 'form-control'])}}--}}

                        </div>
                        {!! Form::open(['route' => ['support.whitelist.destroy', $item->id], 'method' => 'delete', 'class' => 'form-horizontal']) !!}
                        {{Form::submit('delete', ['class' => 'btn btn-xs btn-default pull-right'])}}
                        {{Form::close()}}

                    @endslot
                @endcomponent
            </div>
        @endforeach
    </div>

    <div class="col-md-3">
        @component('components.content-panel', ['heading' => 'ip aan whitelist toevoegen'])
        @slot('content')
                {!! Form::open(['route' => ['support.whitelist.store', $location->id], 'method' => 'post', 'class' => 'form-horizontal']) !!}
                    {{Form::hidden('location', $location->id)}}
                    <div class="form-group {{ $errors->has('adres') ? 'has-error' : ''}}">
                        <label class="control-label col-sm-3" for="adres">adres:</label>
                        <div class="col-sm-9">
                            {{Form::text('ip_address', null ,['class' => 'form-control', 'rows' => '3', 'placeholder' => '00.00.00.100'])}}
                            @include('components.input-error-msg', ['name' => 'adres'])
                        </div>
                    </div>
                    {{Form::submit('save', ['class' => 'btn btn-default pull-right'])}}
                {{Form::close()}}
            @endslot
        @endcomponent
    </div>



@endsection
