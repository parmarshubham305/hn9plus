@extends('developer.layouts.layout')
@section('content')
<livewire:developer.chat />
@stop
@section('js')
<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdn.socket.io/4.6.0/socket.io.min.js" integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous"></script>
<script>
    var chats = '{!! json_encode($chats) !!}';
    var socketHost = '{{ env("SOCKET_HOST") }}';
    var element = document.querySelector('#element');
    
    element.scrollTop = element.scrollHeight;
    $(function() {
        let socket = io(socketHost);

        socket.on('connection');
        Livewire.on('scrollToHeight', data => {
            element.scrollTop = element.scrollHeight;
        });

        Livewire.on('sendMessageToServer', data => {
            socket.emit(data.channel, data);
        });

        JSON.parse(chats).forEach((item, index) => {
            socket.on(item.channel, (data) => {
                var cssClass = (data.send_by == 'User' ? 'message-right' : 'message-left');
                var html = `<div class="`+cssClass+` d-flex align-items-start"><img src="{{ asset('frontend/images/user-grey.png') }}" alt="user-grey" class="img-fluid" width="40" height="40" /><div class="message-box"><p>`+ data.message +`</p></div></div>`;
                $('#element').append(html);
                element.scrollTop = element.scrollHeight;
            });
        });
        
    });
</script>
@stop