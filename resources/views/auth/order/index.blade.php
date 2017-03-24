@extends('layouts.orders')

@section('content')
<div class="container">

    <div class="col-lg-12">
        <div class="row">
            @foreach($tafels as $tafel)
                <div class="col-lg-3">
                    <a href="{{route('order.show', $tafel->id)}}">
                        <div class="thumbnail">
                            <p class="text-center">{{$tafel->id}}</p>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection
