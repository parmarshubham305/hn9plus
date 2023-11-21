<?php

namespace App\Jobs\Backend;

use App\Models\Project;
use App\Models\Chat;
use App\Models\ChatUser;
use App\Models\ChatMessage;
use Illuminate\Support\Str;

class ProjectJob
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if (!isset($this->data['id'])) {
            $this->data['id'] = null;
        }
        $data = Project::firstOrNew(['id' => $this->data['id']]);
        
        $data->fill($this->data);
        
        $data->save();

        //--- Check Chat
        $chat = Chat::where('project_id', $this->data['id'])->first();
        
        $randomString = Str::random(7);
        if(!$chat) {
            $chat = Chat::create([
                'project_id' => $this->data['id'],
                'chat_type' => 'Group',
                'channel' => $randomString,
                'title' => $data['title']
            ]);
            
        }
        if(!empty($data['project_manager_id'])) {
            ChatUser::updateOrCreate([
                'chat_id' => $chat['id'],
                'user_id'  => $data['project_manager_id'],
                'user_type' => 'Manager'
            ],[
                'chat_id' => $chat['id'],
                'user_id'  => $data['project_manager_id'],
                'user_type' => 'Manager'
            ]);
        } else {
            ChatUser::where([
                'chat_id' => $chat['id'],
                'user_type' => 'Manager'
            ])->delete();
        }
        
    }
}
