@extends('layouts.app')

@section('content')
<div class="container">
    {!! Breadcrumbs::render('home') !!}

    <div id="ajaxResponse">

    </div>

    <h1>tafels</h1>
    <hr>

    {!! Form::open(['method' => 'POST', 'class' => 'form'])!!}

    <div class="form-group">
        {{Form::label('aantal_plaatsen', 'Aantal plaatsen')}}
        {{Form::text('aantal_plaatsen', null, ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::label('status', 'Status')}}
        {{Form::text('status', null, ['class' => 'form-control'])}}
    </div>

    {{Form::submit('Aanmaken', ['class' => 'btn btn-default', 'id' => 'submit'])}}
    <a href="{{route('tafel.index')}}" class="btn btn-default">Terug</a>

    {!! Form::close() !!}


</div>

@endsection

@push('js')
<script>
    $(document).ready(function() {
        $('.form').on('submit', function (e) {
            e.preventDefault();
            var aantal_plaatsen = $('#aantal_plaatsen').val();
            var status = $('#status').val();
            $.ajax({
                type: "POST",
                url: '{!! route('tafel.store') !!}',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {aantal_plaatsen: aantal_plaatsen, status: status},
                success: function( msg ) {
                    console.log(msg);
                    $("#ajaxResponse").append("<div>"+msg+"</div>");
                },
                error: function(data){
                    console.log(data);
                    var errors = $.parseJSON(data.responseText);
                    $("#ajaxResponse").append("<div>"+errors+"</div>")
                }
            });
        });
    });
</script>
@endpush

