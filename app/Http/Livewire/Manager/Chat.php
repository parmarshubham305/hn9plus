<?php

namespace App\Http\Livewire\Manager;

use Livewire\Component;
use \App\Models\User;
use \App\Models\Manager;
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
    
    public function mount()
    {
        $chatIn = ChatUser::where('user_id', auth()->guard('project_manager')->user()->id)->where('user_type', 'Manager')->pluck('chat_id', 'chat_id')->toArray();
        
        $this->chats = ChatChannel::whereIn('id', $chatIn)->get()->toArray();
    }

    public function SendMessage() {
        $obj = new ChatMessage();
        $obj->message = $this->message;
        $obj->chat_id = $this->chatId;
        $obj->user_id = auth()->guard('project_manager')->user()->id;
        $obj->send_by = 'Manager';
        $obj->message_type = 'Text';
        $obj->save();

        $broadcastData = [
            'message' => $this->message,
            'user_id' => auth()->guard('project_manager')->user()->id,
            'send_by' => 'Manager',
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
        return view('livewire.manager.chat');
    }
}
