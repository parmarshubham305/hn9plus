<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use \App\Models\User;
use \App\Models\Admin;
use App\Models\Chat as ChatChannel;
use App\Models\ChatMessage;
use App\Models\ChatUser;
use Livewire\WithFileUploads; 

class Chat extends Component
{
    use WithFileUploads;

    public $message = '';
    public $chats = [];
    public $chatId;
    public $chatChannel;
    public $chatUser;
    public $messages;
    public $file;
    public $admin;
    
    public function mount()
    {
        $chatIn = ChatUser::where('user_id', auth()->guard('admin')->user()->id)->where('user_type', 'Admin')->pluck('chat_id', 'chat_id')->toArray();
        
        $this->chats = ChatChannel::whereIn('id', $chatIn)->get()->toArray();

        $this->admin = Admin::first();
    }

    public function SendMessage() {
        $obj = new ChatMessage();
        $obj->message = $this->message;
        $obj->chat_id = $this->chatId;
        $obj->user_id = auth()->guard('admin')->user()->id;
        $obj->send_by = 'Admin';
        $obj->message_type = 'Text';
        $obj->save();

        $broadcastData = [
            'message' => $this->message,
            'send_by' => 'Admin',
        ]; 

        $this->emit($this->chatChannel['channel'], $broadcastData);
        
        // Clear the message after it's sent
        $this->reset(['message']);
        $this->file = '';
    }


    public function getChat($id) 
    {
        $this->chatChannel = ChatChannel::find($id);
        $this->chatId = $id;
        $this->messages = ChatMessage::where('chat_id', $id)->get()->toArray();
        $this->emit('scrollToHeight');
    }

    public function render()
    {
        return view('livewire.backend.chat');
    }
}
