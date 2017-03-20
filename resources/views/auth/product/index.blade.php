@extends('layouts.app')

@section('content')


    <h1>product</h1>
    <hr>
    {!! Breadcrumbs::render('home') !!}


    <a href="{{route('product.create')}}" class="btn btn-default">Nieuw</a>

    <hr>

    <div class="table-responsive table-bordered">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>bereidingsduur</th>
                    <th>naam</th>
                    <th>prijs</th>
                    <th>status</th>
                    <th>opties</th>
                </tr>
            </thead>
            <tbody>

                {{--{{dd($tafels)}}--}}
                @foreach($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->bereidingsduur}}</td>
                        <td>{{$product->naam}}</td>
                        <td>{{$product->prijs}}</td>
                        <td>{{$product->status}}</td>
                        <td>
                            {{--<a class="btn btn-warning btn-xs" href="{{route('tafel.edit', $product->id)}}">wijzigen</a>--}}
                            <button type="button" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#myModal{{$product->id}}">wijzigen</button>

                            <!-- Modal -->
                            <div id="myModal{{$product->id}}" class="modal fade" role="dialog">
                                <div class="modal-dialog">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Modal Header</h4>
                                        </div>
                                        <div class="modal-body">

                                            @if (count($errors) > 0)
                                                {{--{{dd($errors)}}--}}
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            {!! Form::model($product, ['route' => ['product.update', $product->id], 'method' => 'PATCH', 'class' => 'form'])!!}

                                            <div class="form-group">
                                                {{Form::label('bereidingsduur', 'bereidingsduur')}}
                                                {{Form::number('bereidingsduur', null, ['class' => 'form-control'])}}
                                            </div>

                                            <div class="form-group">
                                                {{Form::label('naam', 'naam')}}
                                                {{Form::text('naam', null, ['class' => 'form-control'])}}
                                            </div>

                                            <div class="form-group">
                                                {{Form::label('prijs', 'prijs')}}
                                                {{Form::text('prijs', null, ['class' => 'form-control'])}}
                                            </div>
                                            <div class="form-group">
                                                {{Form::label('beschrijving', 'beschrijving')}}
                                                {{Form::textarea('beschrijving', null, ['class' => 'form-control'])}}
                                            </div>

                                            <div class="form-group">
                                                {{Form::label('status', 'Status')}}
                                                {{Form::select('status', ['asd'], null, ['class' => 'form-control'])}}
                                            </div>

                                            {{Form::submit('Aanmaken', ['class' => 'btn btn-default', 'id' => 'submit'])}}
                                            <a href="{{route('tafel.index')}}" class="btn btn-default">Terug</a>

                                            {!! Form::close() !!}
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

@push('js')
    <script>
        $('#myModal{{Session('id')}}').modal('show');
    </script>
@endpush
