@extends('layouts.app')

@section('content')
    <div class="container">
        {!! Breadcrumbs::render('home') !!}

        <h1>tafels</h1>
        <hr>

        {!! Form::model($tafel, ['route' => ['tafel.update', $tafel->id], 'method' => 'PATCH'])!!}

        <div class="form-group">
            {{Form::label('aantal_plaatsen', 'Aantal plaatsen')}}
            {{Form::text('aantal_plaatsen', null, ['class' => 'form-control'])}}
        </div>

        <div class="form-group">
            {{Form::label('status', 'Status')}}
            {{Form::text('status', null, ['class' => 'form-control'])}}
        </div>

        {{Form::submit('Wijzigen', ['class' => 'btn btn-default'])}}
        <a href="{{route('tafel.index')}}" class="btn btn-default">Terug</a>

        {!! Form::close() !!}


    </div>
@endsection
