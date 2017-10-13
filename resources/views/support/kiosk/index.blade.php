@extends('layouts.support')

@section('content')

    <a class="btn btn-default" href="{{route('support.kiosk.create')}}">create</a>

    <hr>

    @component('components.table-panel')
        @slot('thead')
            <tr>
                <th>id</th>
                <th>api_key</th>
                <th>model_nr</th>
                <th>status</th>
                <th>location_id</th>
                <th>actions</th>
            </tr>
        @endslot
        @slot('tbody')
            @foreach($kiosks as $kiosk)
                <tr>
                    <td>{{$kiosk->id}}</td>
                    <td>{{$kiosk->api_key}}</td>
                    <td>{{$kiosk->model_nr}}</td>
                    <td>{{$kiosk->status}}</td>
                    <td>{{$kiosk->location ? $kiosk->location->adres : 'not registered'}}</td>
                    <td>
                        <a class="btn btn-xs btn-default" href="{{route('support.kiosk.edit', $kiosk->id)}}">
                            edit
                        </a>
                    </td>
                </tr>
            @endforeach
        @endslot
    @endcomponent

@endsection
