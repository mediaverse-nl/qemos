@extends('layouts.error')

@section('content')
    <div class="container">
        <div class="error-page">
            <h2 class="headline text-info"> 403</h2>
            <div class="error-content">
                <h2>{{ $exception->getMessage() }}</h2>
                <h3><i class="fa fa-warning text-yellow"></i> Uw heeft geen rechten tot deze pagina.</h3>
                <p>
                    Je hebt niet de juiste rechten om op deze pagina te zijn.
                    <br>
                    Neem contact op met de admin of ga terug naar <a href="{{route('home')}}">home</a>.
                </p>
            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        footer{
            display: none !important;
        }
    </style>
@endpush