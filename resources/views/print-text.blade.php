@extends('layouts.kiosk')

@section('content')
    <h3>auto print on load</h3>
@stop

@push('css')
    @php
        $handle = printer_open("HP Deskjet 930c");
        dd($handle);
    @endphp


    <style>

    </style>
@endpush

@push('js')
    <script>
        window.onload = function() { window.print(); }
    </script>
@endpush
