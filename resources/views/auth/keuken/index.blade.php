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

                {{--{{dd($tafels)}}--}}
                @foreach($tafels as $tafel)
                    <tr>
                        <td>{{$tafel->id}}</td>
                        <td>{{$tafel->aantal_plaatsen}}</td>
                        <td>{{$tafel->status}}</td>
                        <td>
                            {{--<a class="btn btn-warning btn-xs" href="{{route('tafel.edit', $tafel->id)}}">wijzigen</a>--}}
                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal{{$tafel->id}}">Open Modal</button>

                            <!-- Modal -->
                            <div id="myModal{{$tafel->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Modal Header</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>{{$tafel}}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <div>

@endsection
