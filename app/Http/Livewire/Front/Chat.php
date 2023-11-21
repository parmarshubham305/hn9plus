<?php

namespace App\Http\Livewire\Front;

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

    public $message = '', $selectedChat, $chatId, $chats, $messages, $file, $admin, $chatTextStyle = [ 'fontStyle' => '', 'fontWeight' => '', 'textDecoration' => '' ];
    
    public function mount()
    {
        $chatIn = ChatUser::where('user_id', auth()->user()->id)->where('user_type', 'User')->pluck('chat_id', 'chat_id')->toArray();

        $this->chats = ChatChannel::whereIn('id', $chatIn)->get()->toArray();

        $this->admin = Admin::first();
        
    }

    public function SendMessage() {
        if(!empty($this->message)) {
            $style = "font-style:". $this->chatTextStyle['fontStyle'] ."; text-decoration:".$this->chatTextStyle['textDecoration'] . "; font-weight:" . $this->chatTextStyle['fontWeight'];
            $message = '<p style="'. $style .'">'. $this->message .'</p>';
            
            $obj = new ChatMessage();
            $obj->message = $message;
            $obj->chat_id = $this->chatId;
            $obj->user_id = auth()->user()->id;
            $obj->send_by = 'User';
            $obj->message_type = 'Text';
            $obj->save();

            $broadcastData = [
                'message' => $message,
                'channel' => $this->selectedChat['channel'],
                'send_by' => 'User',
            ]; 

            $this->emit('sendMessageToServer', $broadcastData);
            // Clear the message after it's sent
            $this->reset(['message', 'chatTextStyle']);
            $this->file = '';
        }
    }

    public function selectChat($id) {
        $this->chatId = $id;
        $this->selectedChat = ChatChannel::find($id);
        $this->messages = ChatMessage::where('chat_id', $this->chatId)->get()->toArray();
        $this->emit('scrollToHeight');
    }

    public function updateStyle($style)
    {
        switch ($style) {
            case 'bold':
                $this->chatTextStyle['fontWeight'] = $this->chatTextStyle['fontWeight'] == '' ? $style : '';
                break;

            case 'italic':
                $this->chatTextStyle['fontStyle'] = $this->chatTextStyle['fontStyle'] == '' ? $style : '';
                break;

            case 'underline':
                $this->chatTextStyle['textDecoration'] = $this->chatTextStyle['textDecoration'] == '' ? $style : '';
                break;
            
            default:
                # code...
                break;
        }
    }

    public function render()
    {
        return view('livewire.front.chat');
    }
}
