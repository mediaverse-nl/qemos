@extends('layouts.app')

@section('content')


    <h1>tafels</h1>
    <hr>
    {!! Breadcrumbs::render('home') !!}


    <a href="{{route('tafel.create')}}" class="btn btn-default">Nieuw</a>

    <hr>

    <div class="table-responsive table-bordered">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>tafel nummer</th>
                    <th>tafel plaatsen</th>
                    <th>status</th>
                    <th>opties</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tafels as $tafel)
                    <tr>
                        <td>{{$tafel->id}}</td>
                        <td>{{$tafel->aantal_plaatsen}}</td>
                        <td>{{$tafel->status}}</td>
                        <td>
                            <a class="btn btn-warning btn-xs" href="{{route('tafel.edit', $tafel->id)}}">wijzigen</a>
                            <a class="btn btn-danger btn-xs" href="">verwijderen</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <div>

@endsection
