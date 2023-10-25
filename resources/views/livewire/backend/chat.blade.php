<div>
    <div class="col-md-3">
        <div class="box box-success direct-chat direct-chat-success">
            <div class="box-header with-border">
                <h3 class="box-title">Users</h3>
            </div>
            <div class="box-body">
                <div class="direct-chat-messages">
                    <ul class="contacts-list">
                        @foreach($chats as $chat)
                        @php
                            $not_seen = \App\Models\ChatMessage::where('id', $chatId)->where('send_by', 'User')->where('is_seen', '0')->get() ?? null
                        @endphp
                        <li>
                            <a wire:click="getUser({{ $chat['user']['id'] }})">
                                <!-- <img class="contacts-list-img" src="../dist/img/user1-128x128.jpg" alt="User Image"> -->
                                <div class="contacts-list-info">
                                    @php
                                        $color = $chatUser && $chat['user']['id'] == $chatUser['id'] ? 'Blue' : 'Black';
                                    @endphp
                                    <span class="contacts-list-name" style="color: {{ $color }};">
                                    {{ $chat['user']['first_name'] }} {{ $chat['user']['last_name'] }} @if(filled($not_seen)) <div class="badge badge-success rounded">{{ $not_seen->count() }}</div> @endif
                                    <small class="contacts-list-date pull-right">2/28/2015</small>
                                    </span>
                                    <span class="contacts-list-msg">How have you been? I was...</span>
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="box box-success direct-chat direct-chat-success">
            <div class="box-header with-border">
                <h3 class="box-title">@if( $chatUser ) <b class="text-primary"> {{ $chatUser['first_name'] }} {{ $chatUser['last_name'] }} </b> @endif</h3>
                <!-- <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="3 New Messages" class="badge bg-green">3</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                    <i class="fa fa-comments"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div> -->
            </div>
            <div class="box-body">
                <div class="direct-chat-messages" id="element" wire:ignor>
                    @if($messages)
                        @foreach($messages as $message)
                            @php
                                $class = $message['send_by'] == 'User' ? '' : 'right';
                            @endphp
                            <div class="direct-chat-msg {{ $class }}">
                                <div class="direct-chat-info clearfix">
                                    <!-- <span class="direct-chat-name pull-right">Admin</span> -->
                                    <span class="direct-chat-timestamp pull-left">{{ $message['created_at']->format('d - M - Y, H:i A') }}</span>
                                </div>
                                <img class="direct-chat-img" src="{{ asset('backend/dist/img/user3-128x128.jpg') }}" alt="Message User Image">
                                <div class="direct-chat-text">
                                    {!! $message['message'] !!}
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="box-footer">
                @if(!$chatUser && auth()->guard('admin')->check())
                    <div class="input-group">
                        <h4 class="text-center">Click on a user to start a chat</h4>
                    </div>
                @else
                <form wire:submit.prevent="SendMessage" method="post">
                    <div wire:loading wire:target='SendMessage'>
                        Sending message . . . 
                    </div>
                    <div class="input-group">
                        <input type="text" wire:model="message" placeholder="Type Message ..." class="form-control">
                        <span class="input-group-btn">
                        <button type="submit" class="btn btn-success btn-flat">Send</button>
                        </span>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>