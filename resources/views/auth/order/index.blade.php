@extends('layouts.orders')

@section('content')
<div class="container">

    <div class="col-lg-12">
        <div class="row">
            @foreach($tafels as $tafel)
                <div class="col-lg-3">
                    <a href="{{route('order.show', $tafel->id)}}">
                        <div class="thumbnail {{!$tafel->bezet ? 'alert-success' : 'alert-warning'}}">
                            <p class="text-center">Tafel #: {{$tafel->id}}</p>
                            <p class="text-center">plaatsen: {{$tafel->aantal_plaatsen}}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
