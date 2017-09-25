@extends('layouts.admin')

@section('content')

    <h1>product</h1>
    <hr>

    {!! Breadcrumbs::render('home') !!}

    <button id="btn-add" name="btn-add" class="btn btn-default btn-xs">Nieuw</button>

    <hr>

    <div id="successMsg"></div>

    <div class="table-responsive table-bordered">
        <table class="table table-hover" style="margin-bottom: 0px !important;">
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
            <tbody id="tasks-list" name="tasks-list">
                @foreach($products as $product)
                    <tr id="task{{$product->id}}">
                        <td>{{$product->id}}</td>
                        <td>{{$product->bereidingsduur}}</td>
                        <td>{{$product->naam}}</td>
                        <td>{{$product->prijs}}</td>
                        <td>{{$product->status}}</td>
                        <td>
                            <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$product->id}}">wijzigen</button>
                            <button class="btn btn-danger btn-xs btn-delete delete-task" value="{{$product->id}}">verwijderen</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    <div>

    {{--<hr>--}}

    {{--Model--}}
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel">Product</h4>
                </div>
                <div class="modal-body">
{{--                    {{Illuminate\Validation\Rule::in(['a'=>'a','c'=>'c'])}}--}}
                    <form id="frmTasks" name="frmTasks" class="" novalidate="">
                        {{Form::hidden('id', null, ['class' => 'form-control'])}}
                        <div class="form-group error-naam" >
                            {{Form::label('naam', 'naam')}}
                            {{Form::text('naam', null, ['class' => 'form-control'])}}
                            <small id="error-naam" class="error"></small>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group error-bereidingsduur">
                                    {{Form::label('bereidingsduur', 'bereidingsduur')}}
                                    {{Form::number('bereidingsduur', null, ['class' => 'form-control'])}}
                                    <small id="error-bereidingsduur" class="error"></small>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group error-prijs">
                                    {{Form::label('prijs', 'prijs')}}
                                    {{Form::text('prijs', null, ['class' => 'form-control'])}}
                                    <small id="error-prijs" class="error"></small>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group error-status">
                                    {{Form::label('status', 'Status')}}
                                    {{Form::select('status', \App\Product::status(), null, ['class' => 'form-control'])}}
                                    <small id="error-status" class="error"></small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group error-bezonderheden">
                                    {{Form::label('bezonderheden', 'bezonderheden')}}
                                    {{Form::select('bezonderheden', \App\Product::bezonderheden()->push('---', null), 0, ['class' => 'form-control'])}}
                                    <small id="error-bezonderheden" class="error"></small>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group error-Menu">
                                    {{Form::label('menu', 'Menu')}}
                                    {{Form::select('menu', collect(\App\Menu::all())->pluck('naam', 'id'), null, ['class' => 'form-control'])}}
                                    <small id="error-Menu" class="error"></small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group error-beschrijving">
                            {{Form::label('beschrijving', 'beschrijving')}}
                            {{Form::textarea('beschrijving', null, ['class' => 'form-control', 'rows' => '3'])}}
                            <small id="error-beschrijving" class="error"></small>
                        </div>

                        <div class="form-group error-ingredienten">
                            {!! Form::label('ingredienten', 'ingredienten') !!}<br>
                            <div class="row ingredients">
{{--                                {{$ingredients}}--}}
                                @foreach($ingredients as $ingredient)
                                    <div class="col-lg-4" style="margin-bottom: 10px;">
                                        {{--{{$ingredient}}--}}
                                        {!! Form::checkbox('ingredienten[]', $ingredient->id, null, ['class' => 'ingredienten'.$ingredient->id.' ingre']) !!}
                                        {!! Form::label('ingredienten', $ingredient->ingredient) !!}
                                    </div>
                                @endforeach
                            </div>

                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes</button>
                    <input type="hidden" id="row_id" name="row_id" value="0">
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
        <meta name="_token" content="{!! csrf_token() !!}" />

        <script type="text/javascript" src="{{ asset('js/ajax/product.js') }}"></script>
@endpush
