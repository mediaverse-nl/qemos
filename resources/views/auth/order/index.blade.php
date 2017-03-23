@extends('layouts.app')

@section('content')
{{--<div class="container">--}}

    <h1>Dashboard</h1>
    <hr>
    {!! Breadcrumbs::render('home') !!}
    <hr>

    <div class="col-lg-1">
        <h1>Menu</h1>

        <div class="col-lg-12">
            <div class="thumbnail">
                dessert
            </div>
        </div>
        <div class="col-lg-12">
            <div class="thumbnail">
                drank
            </div>
        </div>
        <div class="col-lg-12">
            <div class="thumbnail">
                vlees gerechten
            </div>
        </div>

    </div>
    <div class="col-lg-6">
        <h1>Producten</h1>
        <div class="row">

    @for ($i = 0; $i < 20; $i++)
            <div class="col-lg-3">
                <div class="thumbnail">
                    sdsfsdfsdf
                </div>
            </div>
        @endfor        {{--<div class="thumbnail">--}}

        </div>
    </div>
    <div class="col-lg-3">
        {{--<div class="">--}}
        <h1>Bestelling</h1>
            <div class="thumbnail">

            </div>
        {{--</div>--}}
    </div>

    <div class="col-lg-2">
        <h1> .</h1>

        <div class="col-lg-12">
            <div class="thumbnail">
                verwijderen
            </div>
        </div>
        <div class="col-lg-12">
            <div class="thumbnail">
                korting
            </div>
        </div>
        <div class="col-lg-12">
            <div class="thumbnail">
                Splitsen
            </div>
        </div>

        <div class="col-lg-12">
            <div class="thumbnail">
                Afrekenen
            </div>
        </div>
        <div class="col-lg-12">
            <div class="thumbnail">
                {{--status veranderen van alle nieuwe bestelde producten --}}
                opslaan
            </div>
        </div>
        {{--<div class="thumbnail">--}}
            {{--<ul>--}}
                {{--<li><a href="#">Splitsen</a></li>--}}
                {{--<li><a href="#">Afrekenen</a></li>--}}
            {{--</ul>--}}
        {{--</div>--}}
    </div>

{{--</div>--}}
@endsection
