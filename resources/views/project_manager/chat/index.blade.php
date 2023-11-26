@extends('project_manager.layouts.layout')
@section('content')
<section class="content-header">
     <h1>
		Chat 
     </h1>
    <ol class="breadcrumb">
		<li><a href="{{ route('project_manager.chats.create') }}">Create New Chat</a></li>
	</ol>
</section>
<section class="content">
    <div class="row">
        <livewire:manager.chat />
    </div>
</div>
@stop
@section('js')
<script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>
<script src="https://cdn.socket.io/4.6.0/socket.io.min.js" integrity="sha384-c79GN5VsunZvi+Q/WObgk2in0CbZsHnjEqvFxC5DxHn9lTfNce2WW6h2pH6u/kF+" crossorigin="anonymous"></script>
<script>
    var socketHost = '{{ env("SOCKET_HOST") }}';
    let chats = '{!! json_encode($chats) !!}';
    var userId = '{{ $userId }}'

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

            Livewire.on('scrollToHeight', data => {
                element.scrollTop = element.scrollHeight;
            });

            socket.on(chat.channel, (data) => {
                var cssClass = (data.user_id == userId && data.send_by == 'Manager' ? 'right' : '');
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