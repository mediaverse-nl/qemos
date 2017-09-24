@extends('layouts.kiosk')

@section('content')
    <div class="container">

        <div class="col-md-12">
             <div class="panel panel-content">
                 <div class="panel-body">

                     <h1>kies dag</h1>

                     <div class="col-lg-6">
                         <h3>vandaag</h3>
                         <h1>{{\Carbon\Carbon::now()}}</h1>
                     </div>
                     <div class="col-lg-6">
                         <h3>anders</h3>

                         <div id="datepicker" data-date="12/03/2012"></div>
                         <input type="hidden" id="my_hidden_input">

                     </div>

                 </div>
             </div>
        </div>
        <div class="col-md-12">
             <div class="panel panel-content">
                 <div class="panel-body">

                     <h1>kies tafel</h1>

                     <div class="col-lg-6">
                         <img src="/image/plattegrond.jpg" class="img-responsive">
                     </div>
                     <div class="col-lg-6">
                         <h3>Kies tafel</h3>
                         @foreach([1,2,3,4,5] as $i)
                             {{--dit zijn alleen de beschikbaren tafels op de gesleceteerde datum--}}
                             <div class="col-lg-3">
                                 <div class="panel panel-default">
                                     <div class="panel-body">
                                         <p class="text-center">{{$i}}</p>
                                     </div>
                                 </div>
                             </div>
                         @endforeach
                     </div>

                 </div>
             </div>
        </div>

        <div class="col-md-12">
            <div class="panel panel-content">
                <div class="panel-body">
                    <h1>T.a.v</h1>
                    <div >
                        <div class="form-group">
                            <label for="name">naam *</label>
                            <input id="name" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input id="email" name="email" class="form-control">
                        </div>
                        <small>Alle velden met een * zijn verplicht</small>
                    </div>
                 </div>
             </div>
        </div>

    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.css">
@endpush

@push('js')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.js"></script>
    <script>
        $('#datepicker').datepicker({
            format: "dd/mm/yyyy",
            language: "nl",
            daysOfWeekDisabled: "0,5,6",
            calendarWeeks: true,
            todayHighlight: true,
            datesDisabled: ['09/06/2017', '09/21/2017']
        });
        $('#datepicker').on('changeDate', function() {
            $('#my_hidden_input').val(
                $('#datepicker').datepicker('getFormattedDate')
            );
        });
    </script>
@endpush