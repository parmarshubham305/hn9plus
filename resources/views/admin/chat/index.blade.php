@extends('admin.layouts.layout')
@section('content')
<section class="content-header">
     <h1>
		Chat 
     </h1>
</section>
<section class="content">
    <div class="row">
        <livewire:backend.chat />
    </div>
</div>
@stop
@section('js')
<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdn.socket.io/4.6.0/socket.io.min.js" integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous"></script>
<script>
    var socketHost = '{{ env("SOCKET_HOST") }}';
    let chats = '{!! json_encode($chats) !!}';

    chats = JSON.parse(chats);
    
    var element = document.querySelector('#element');
    element.scrollTop = element.scrollHeight;

    let socket = io(socketHost);

    socket.on('connection');
    $(function() {
        chats.forEach((chat) => {

            Livewire.on(chat.channel, data => {
                socket.emit(chat.channel, data);
            });

            socket.on(chat.channel, (data) => {
                var cssClass = (data.send_by == 'Admin' ? 'right' : '');
                var html = `<div class="direct-chat-msg `+cssClass+`">
                                <img class="direct-chat-img" src="{{ asset('backend/dist/img/user3-128x128.jpg') }}" alt="Message User Image">
                                <div class="direct-chat-text">
                                    `+ data.message +`
                                </div>
                            </div>`;
                $('#element').append(html);
                element.scrollTop = element.scrollHeight;
            });
        });
    });
</script>
@stop