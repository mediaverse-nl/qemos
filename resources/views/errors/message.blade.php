
<div class="container" style="">
    <div class="col-md-12">
        <div id="successMsg"></div>

        @if($errors->any())
        {{--<div class="container">--}}
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                {{ $error }}<br>
                @endforeach
            </div>
            {{--</div>--}}
        @endif

        @if(Session::has('message'))
            <div class="alert alert-success fade in ">
                <span class="glyphicon glyphicon-ok"></span>
                <em> {!! session('message') !!}</em>
            </div>
        @endif
    </div>
</div>
