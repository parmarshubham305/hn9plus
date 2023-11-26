<section class="chatboard border bg-white">
    <div class="row g-0">
        <div class="col-lg-3 border-start border-end d-lg-inline-block d-none">
            <div class="userr-details">
                @if($chats)
                    @foreach($chats as $chat)
                    <div wire:click="selectChat({{ $chat['id'] }})" class="user-profile px-4 py-2 d-flex align-items-center border-bottom">
                        <img src="{{ asset('frontend/images/user-grey.png') }}" alt="user-grey" class="img-fluid" width="58" height="58">
                        <div class="user ms-4">
                            <h4 class="mb-1 fs-5">{{ $chat['title'] }}</h4>
                            <!-- <small class="text-muted"><i class="fa-solid fa-circle fa-xs me-1 text-success"></i>Online</small> -->
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-lg-9 border-start border-end d-flex flex-column">
            <div class="chat-header px-4 py-2 d-flex align-items-center border-bottom">
                <div class="user-profile d-flex align-items-center border-bottom">
                    <img src="{{ asset('frontend/images/user-grey.png') }}" alt="user-grey" class="img-fluid" width="40" height="40">
                    @if($selectedChat)
                    <div class="user ms-4">
                        <h4 class="mb-1 fs-6">{{ $selectedChat['title'] }}</h4>
                        <small class="text-muted"><i class="fa-solid fa-circle fa-xs me-1 text-success"></i>Online</small>
                    </div>
                    @endif
                </div>
                <ul class="list-unstyled list-inline mb-0 ms-auto me-0">
                    <li class="list-inline-item me-3 me-md-4">
                        <a href="#" class="fw-semibold text-dark d-none">schedule a meeting</a>
                    </li>
                    <li class="list-inline-item me-3 me-md-4">
                        <a href="#"><i class="fa-solid fa-phone fa-lg"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="#"><i class="fa-solid fa-circle-exclamation fa-lg"></i></a>
                    </li>
                </ul>
            </div>
            <div class="message px-md-4 px-3" id="element" wire:ignor>
                @if($messages)
                @foreach($messages as $message)
                @php
                    $class = $message['send_by'] == 'Admin' ? 'message-left' : 'message-right';
                @endphp
                <div class="{{ $class }} d-flex align-items-start">
                    <img src="{{ asset('frontend/images/user-grey.png') }}" alt="user-grey" class="img-fluid" width="40" height="40">
                    <div class="message-box">
                        <p>{!! $message['message'] !!}</p>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
            <div class="chat-footer border-top">
                <div class="input-group flex-nowrap">
                    @php
                    $fontStyle = "font-style:". $chatTextStyle['fontStyle'] ."; text-decoration:".$chatTextStyle['textDecoration'] . "; font-weight:" . $chatTextStyle['fontWeight'];
                    @endphp
                    <input type="text" wire:model="message" style="{{ $fontStyle }}" class="form-control border-0 px-3" placeholder="Type Something" aria-label="Type Something">
                    <a href="#" class="px-3 text-muted"><i class="fa-solid fa-face-smile fa-lg"></i></a>
                    <a wire:click="SendMessage" class="px-3"> <img src="{{ asset('frontend/images/submit.png') }}" alt="submit" class="img-fluid"></a>
                </div>
                <ul class="list-unstyled list-inline mb-0 p-3">
                    <li class="list-inline-item">
                        <a href="#"><i class="fa-solid fa-paperclip"></i></a>
                    </li>
                    <li class="list-inline-item">
                        @php
                            $style = in_array('bold', $chatTextStyle) ? 'color: #f7c644' : '';
                        @endphp
                        <a wire:click="updateStyle('bold')" style="{{ $style }}"><i class="fa-solid fa-bold"></i></a>
                    </li>
                    <li class="list-inline-item">
                        @php
                            $style = in_array('italic', $chatTextStyle) ? 'color: #f7c644' : '';
                        @endphp
                        <a wire:click="updateStyle('italic')" style="{{ $style }}"><i class="fa-solid fa-italic"></i></a>
                    </li>
                    <li class="list-inline-item">
                        @php
                            $style = in_array('underline', $chatTextStyle) ? 'color: #f7c644' : '';
                        @endphp
                        <a wire:click="updateStyle('underline')" style="{{ $style }}"><i class="fa-solid fa-underline"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>