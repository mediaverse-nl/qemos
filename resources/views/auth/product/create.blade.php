@extends('layouts.app')

@section('content')

    <h1>tafels</h1>

    <hr>

    {!! Breadcrumbs::render('home') !!}

    {!! Form::open(['route' => 'product.store', 'method' => 'POST', 'class' => 'form'])!!}

    <div class="form-group">
        {{Form::label('bereidingsduur', 'bereidingsduur')}}
        {{Form::number('bereidingsduur', null, ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('naam', 'naam')}}
        {{Form::text('naam', null, ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('prijs', 'prijs')}}
        {{Form::text('prijs', null, ['class' => 'form-control'])}}
    </div>
    <div class="form-group">
        {{Form::label('beschrijving', 'beschrijving')}}
        {{Form::textarea('beschrijving', null, ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('status', 'Status')}}
        {{Form::select('status', ['asd'], null, ['class' => 'form-control'])}}
    </div>

    {{Form::submit('Aanmaken', ['class' => 'btn btn-default', 'id' => 'submit'])}}
    <a href="{{route('tafel.index')}}" class="btn btn-default">Terug</a>

    {!! Form::close() !!}


@endsection

@push('js')
<script>

</script>
@endpush

