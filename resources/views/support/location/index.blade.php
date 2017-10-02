@extends('layouts.support')

@section('content')

    <a class="btn btn-default" href="{{route('support.location.create')}}">create</a>

    <hr>

    @component('components.table-panel')
        @slot('thead')
            <tr>
                <th>id</th>
                <th>adres</th>
                <th>postcode</th>
                <th>stad</th>
                <th>lang</th>
                <th>btw</th>
                <th>kvk</th>
                <th>status</th>
                <th>actions</th>
            </tr>
        @endslot
        @slot('tbody')
            @foreach($locations as $location)
                <tr>
                    <td>{{$location->id}}</td>a
                    <td>
                        <a class="btn btn-xs btn-default" href="{{route('support.kiosk.edit', 1)}}">
                            edit
                        </a>
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent

@endsection
