<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use \App\Models\User;
use \App\Models\Admin;
use App\Models\Chat as ChatChannel;
use App\Models\ChatMessage;
use Livewire\WithFileUploads; 

class Chat extends Component
{
    use WithFileUploads;

    public $message = '', $chatId, $messages, $file, $admin, $chatTextStyle = [ 'fontStyle' => '', 'fontWeight' => '', 'textDecoration' => '' ];
    
    public function mount()
    {
        $this->admin = Admin::first();
        $this->chatId = ChatChannel::where('admin_id', $this->admin['id'])->where('user_id', auth()->user()->id)->value('id');
        $this->messages = ChatMessage::where('chat_id', $this->chatId)->get();
    }

    public function SendMessage() {
        if(!empty($this->message)) {
            $style = "font-style:". $this->chatTextStyle['fontStyle'] ."; text-decoration:".$this->chatTextStyle['textDecoration'] . "; font-weight:" . $this->chatTextStyle['fontWeight'];
            $message = '<p style="'. $style .'">'. $this->message .'</p>';

            $obj = new ChatMessage();
            $obj->message = $message;
            $obj->chat_id = $this->chatId;
            $obj->send_by = 'User';
            $obj->message_type = 'Text';
            $obj->save();

            $broadcastData = [
                'message' => $message,
                'send_by' => 'User',
            ]; 

            $this->emit('sendMessageToServer', $broadcastData);
            // Clear the message after it's sent
            $this->reset(['message', 'chatTextStyle']);
            $this->file = '';
        }
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
