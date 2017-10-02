@extends('layouts.support')

@section('content')

    @component('components.table-panel')
        @slot('thead')
            <tr>
                <th>id</th>
                <th>asdasd</th>
            </tr>
        @endslot
        @slot('tbody')
            <tr>
                <td>1</td>
                <td>asdasd</td>
            </tr>
            <tr>
                <td>2</td>
                <td>asdasd</td>
            </tr>
        @endslot
    @endcomponent

@endsection
