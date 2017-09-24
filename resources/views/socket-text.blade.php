@extends('layouts.master')

@section('content')
    <p id="power">0</p>
@stop

@section('footer')
    <script src="https://cdn.socket.io/socket.io-1.3.5.js"></script>
{{--    <script src="{{ asset('js/server.js') }}"></script>--}}
    <script>
        //var socket = io('http://localhost:3000');
        var socket = io('http://localhost:6379');
        socket.on("test-channel:App\\Events\\OrderPosted", function(message){
            // increase the power everytime we load test route
            $('#power').text(parseInt($('#power').text()) + parseInt(message.data.power));
        });
    </script>
@stop

@push('css')

@endpush

@push('js')
{{--    <script src="//{{ Request::getHost() }}:6001/socket.io/socket.io.js"></script>--}}
{{--<script src="{{ asset('js/socket.io.js') }}"></script>--}}
{{--https://laracasts.com/discuss/channels/general-discussion/step-by-step-guide-to-installing-socketio-and-broadcasting-events-with-laravel-51?page=1--}}
<script src="https://cdn.socket.io/socket.io-1.3.5.js"></script>

<script>
    //var socket = io('http://localhost:3000');
    var socket = io('http://localhost:3000');
    socket.on("test-channel:App\\Events\\OrderPosted", function(message){
        // increase the msg everytime we load test route
        $('#msg').text(message.data.msg);
        console.log(message);
    });
</script>
@endpush
