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
                <th>kiosks</th>
                <th>status</th>
                <th class="no-sort">actions</th>
            </tr>
        @endslot
        @slot('tbody')
            @foreach($locations as $location)
                <tr>
                    <td>{{$location->id}}</td>
                    <td>{{$location->adres}}</td>
                    <td>{{$location->postcode}}</td>
                    <td>{{$location->stad}}</td>
                    <td>{{$location->lang}}</td>
                    <td>{{$location->btw}}</td>
                    <td>{{$location->kvk}}</td>
                    <td>{{$location->kiosk()->count()}}</td>
                    <td>{{$location->status}}</td>
                    <td>
                        <a class="btn btn-xs btn-default" href="{{route('support.location.edit', $location->id)}}">
                            edit
                        </a>
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent

@endsection
