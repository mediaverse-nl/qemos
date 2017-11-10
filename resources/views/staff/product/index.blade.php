@extends('layouts.staff')

@section('content')

    <div class="row">
        <div class="col-md-8">
            @component('components.table-panel')
                @slot('thead')
                    <tr>
                        <th>naam</th>
                        <th>bereidingsduur</th>
                        <th>menu</th>
                        <th>prijs</th>
                        <th>status</th>
                        <th class="no-sort">opties</th>
                    </tr>
                @endslot
                @slot('tbody')
                    @foreach($products as $product)
                        <tr id="task{{$product->id}}">
                            {{--<td>{{$product->id}}</td>--}}
                            <td>{{$product->naam}}</td>
                            <td>{{$product->bereidingsduur}} min</td>
                            <td>{{($product->menu) ? $product->menu->naam : 'No winner'}}</td>
                            <td>€ {{$product->prijs}}</td>
                            <td>{{$product->status}}</td>
                            <td>
                                {{--{{dd($product)}}--}}
                                @can('staff-product.update', $product)
                                    <button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$product->id}}">
                                        <i class="fa fa-pencil" aria-hidden="true" title="wijzigen"></i>
                                    </button>
                                @endcan
                                @can('staff-product.delete', $product)
                                    <button class="btn btn-danger btn-xs btn-delete delete-task" value="{{$product->id}}">
                                        <i class="fa fa-trash" aria-hidden="true" title="verwijderen"></i>
                                    </button>
                                @endcan
                            </td>
                        </tr>
                    @endforeach
                @endslot
            @endcomponent
        </div>
    </div>

    @component('components.model-dialog')
        @slot('title')
            Product
        @endslot
        @slot('form')

            {{Form::hidden('id', null, ['class' => 'form-control', 'id' => 'id'])}}
            <div class="form-group error-naam" >
                {{Form::label('naam', 'naam')}}
                {{Form::text('naam', null, ['class' => 'form-control'])}}
                <small id="error-naam" class="error"></small>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group error-bereidingsduur">
                        {{Form::label('bereidingsduur', 'bereidingsduur')}}
                        {{Form::number('bereidingsduur', 0, ['class' => 'form-control'])}}
                        <small id="error-bereidingsduur" class="error"></small>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group error-prijs">
                        {{Form::label('prijs', 'prijs')}}
                        {{Form::text('prijs', 0.00, ['class' => 'form-control'])}}
                        <small id="error-prijs" class="error"></small>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group error-status">
                        {{Form::label('status', 'Status')}}
                        {{Form::select('status', \App\Product::status(), null, ['class' => 'form-control'])}}
                        <small id="error-status" class="error"></small>
                    </div>
                </div>
                <div class="col-lg-6">
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
                    @foreach($ingredients as $ingredient)
                        <div class="col-lg-4" style="margin-bottom: 0px;">
                            {!! Form::checkbox('ingredienten[]', $ingredient->id, null, ['class' => 'ingredienten'.$ingredient->id.' ingre', 'id' => $ingredient->ingredient]) !!}
                            {!! Form::label($ingredient->ingredient, $ingredient->ingredient) !!}
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group error-ingredienten">
                {!! Form::label('peculiarity', 'bezonderheden') !!}<br>
                <div class="row peculiarity">
                    @foreach($peculiarities as $peculiarity)
                        <div class="col-lg-4" style="margin-bottom: 0px;">
                            {!! Form::checkbox('peculiarity[]', $peculiarity->id, null, ['class' => 'peculiarity'.$peculiarity->id.' pecu', 'id' => $peculiarity->value]) !!}
                            {!! Form::label($peculiarity->value, $peculiarity->value) !!}
                        </div>
                    @endforeach
                </div>
            </div>
        @endslot
    @endcomponent

@endsection

@push('js')
    <meta name="_token" content="{!! csrf_token() !!}" />

    <script>
        $(document).ready(function() {
//            test = $('#example').DataTable();

            $.fn.dataTableExt.oStdClasses.sPageButton = "table-pagination-btn";

            $('#table').DataTable({
                // ... skipped ...
//                dom: 'l<"dataTables_length">frtip',
                @can('staff-product.create', $product)
                    initComplete: function(){
                        $("div.dataTables_length").prepend(
                            '<button id="btn-add" name="btn-add" class="btn btn-xs btn-default btn-success" title="aanmaken" style="margin-right: 10px;"><i class="fa fa-plus" aria-hidden="true"></i></button>'
                        );
                    }
                @endcan
            });
//            <button id="btn-add" name="btn-add" class="btn btn-default btn-xs">Nieuw</button>

        });
    </script>

    <script type="text/javascript" src="{{ asset('js/ajax/product.js') }}"></script>
@endpush
