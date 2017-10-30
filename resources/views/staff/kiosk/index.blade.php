@extends('layouts.staff')

@section('content')

    <hr>

    <div id="successMsg"></div>

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

