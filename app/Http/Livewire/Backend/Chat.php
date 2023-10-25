<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use \App\Models\User;
use \App\Models\Admin;
use App\Models\Chat as ChatChannel;
use App\Models\ChatMessage;
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
        $this->chats = ChatChannel::with('user')->get()->toArray();
        $this->admin = Admin::first();
        $this->chatUser = $this->chats[0]['user'];
        $this->chatId = $this->chats[0]['id'];
        $this->chatChannel = $this->chats[0]['channel'];
        $this->messages = ChatMessage::where('chat_id', $this->chatId)->get();
    }

    public function SendMessage() {
        $obj = new ChatMessage();
        $obj->message = $this->message;
        $obj->chat_id = $this->chatId;
        $obj->send_by = 'Admin';
        $obj->message_type = 'Text';
        $obj->save();

        $broadcastData = [
            'message' => $this->message,
            'send_by' => 'Admin',
        ]; 

        $this->emit($this->chatChannel, $broadcastData);
        
        // Clear the message after it's sent
        $this->reset(['message']);
        $this->file = '';
    }


    public function getUser($user_id) 
    {
        $this->chatUser = User::find($user_id);
        $this->chatId = ChatChannel::where('admin_id', $this->admin['id'])->where('user_id', $user_id)->value('id');
        $this->messages = ChatMessage::where('chat_id', $this->chatId)->get();
        $this->chatChannel = ChatChannel::where('admin_id', $this->admin['id'])->where('user_id', $user_id)->value('channel');
    }

    public function render()
    {
        return view('livewire.backend.chat');
    }
}
