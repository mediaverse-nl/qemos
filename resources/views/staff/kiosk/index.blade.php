@extends('layouts.staff')

@section('content')

    <hr>

    <button id="btn-add" name="btn-add" class="btn btn-default btn-xs">Nieuw</button>

    <hr>

    <div id="successMsg"></div>

    {{--<div class="panel panel-content">--}}
        {{--<div class="panel-body">--}}
            {{--<div class="table-responsive">--}}
                {{--<table class="table table-hover" style="margin-bottom: 0px !important;">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th>#</th>--}}
                        {{--<th>api_key</th>--}}
                        {{--<th>model_nr</th>--}}
                        {{--<th>status</th>--}}
                        {{--<th>created_at</th>--}}
                        {{--<th>opties</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody id="tasks-list" name="tasks-list">--}}
                    {{--@foreach($kiosks as $kiosk)--}}
                        {{--<tr id="task{{$kiosk->id}}">--}}
                            {{--<td>{{$kiosk->id}}</td>--}}
                            {{--<td>{{$kiosk->api_key}}</td>--}}
                            {{--<td>{{$kiosk->model_nr}}</td>--}}
                            {{--<td>{{$kiosk->status}}</td>--}}
                            {{--<td>{{$kiosk->created_at}}</td>--}}
                            {{--<td>--}}
                                {{--<button class="btn btn-warning btn-xs btn-detail open-modal" value="{{$kiosk->id}}">wijzigen</button>--}}
                                {{--<button class="btn btn-danger btn-xs btn-delete delete-task" value="{{$kiosk->id}}">verwijderen</button>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                    {{--</tbody>--}}
                {{--</table>--}}
                {{--<div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}


    <div class="row">
        @foreach($kiosks as $kiosk)
            <div class="col-md-4">
                @component('components.content-panel-heading')
                    @slot('heading')
                        Kiosk <small class="pull-right">model nr: {{$kiosk->model_nr}}</small>
                    @endslot
                    @slot('content')

                        <div class="form-group">
                            <label>api_key</label>
                            <div class="form-control">
                                {{$kiosk->api_key}}
                            </div>
                        </div>

                        <div class="form-group">
                            <label>status</label>
                            <div class="form-control">
                                {{$kiosk->status}}
                            </div>
                        </div>

                        <small>created at: {{$kiosk->created_at->format('Y-m-d')}}</small>

                    @endslot
                @endcomponent
            </div>
        @endforeach
    </div>


@endsection

@push('js')
    <meta name="_token" content="{!! csrf_token() !!}" />

    <script type="text/javascript" src="{{ asset('js/ajax/tafel.js') }}"></script>
@endpush

