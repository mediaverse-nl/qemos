@extends('layouts.support')

@section('content')

    <a class="btn btn-default" href="{{route('support.kiosk.create')}}">create</a>

    <hr>

    @component('components.table-panel')
        @slot('thead')
            <tr>
                <th>id</th>
                <th>asdasd</th>
                <th>actions</th>
            </tr>
        @endslot
        @slot('tbody')
            <tr>
                <td>1</td>
                <td>asdasd</td>
                <td>
                    <a class="btn btn-xs btn-default" href="{{route('support.kiosk.edit', 1)}}">
                        edit
                    </a>
                    {{--<a class="btn btn-xs btn-default">--}}
                        {{--verwijderen--}}
                    {{--</a>--}}
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>asdasd</td>
                <td>asdasd</td>
            </tr>
        @endslot
    @endcomponent

@endsection
