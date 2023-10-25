@extends('frontend.layouts.layout')
@section('content')
<livewire:front.chat />
@stop
@section('js')
<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdn.socket.io/4.6.0/socket.io.min.js" integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous"></script>
<script>
    var user = '{!! json_encode($user, JSON_HEX_TAG) !!};'
    var chatChannel = '{!! $chatChannel !!}'
    var socketHost = '{{ env("SOCKET_HOST") }}';
    var element = document.querySelector('#element');
    
    element.scrollTop = element.scrollHeight;
    $(function() {
        let socket = io(socketHost);

        socket.on('connection');
        Livewire.on('sendMessageToServer', data => {
            socket.emit(chatChannel, data);
        });

        socket.on(chatChannel, (data) => {
            var cssClass = (data.send_by == 'User' ? 'message-right' : 'message-left');
            var html = `<div class="`+cssClass+` d-flex align-items-start"><img src="{{ asset('frontend/images/user-grey.png') }}" alt="user-grey" class="img-fluid" width="40" height="40" /><div class="message-box"><p>`+ data.message +`</p></div></div>`;
            $('#element').append(html);
            element.scrollTop = element.scrollHeight;
        });
    });
</script>
@stop