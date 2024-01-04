<?php

namespace App\Jobs\Front;

use App\Models\Project;
use App\Models\Admin;
use App\Models\Skill;
use App\Models\Chat;
use App\Models\ChatUser;
use App\Models\ChatMessage;
use Illuminate\Support\Str;

class FixedRateFormJob
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
        
        $this->data['quote_type'] = 'Fixed Rate';
        $data->fill($this->data);
        
        if(isset($this->data['file'])) {
            if($this->data['file'] && !empty($this->data['_method'] ) && $this->data['_method'] == 'PATCH' && file_exists(public_path($data['file']))) {
                try {
                    if($data['file'] != '') {
                        unlink(public_path($data['file']));
                    }
                } catch (\Throwable $e) {
                    // return false;
                }
                
            }
            $icon = $this->data['file'];
            $name = time(). '.' . $icon->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/fixed_rate');
            $icon->move($destinationPath, $name);
            $fileName = 'uploads/fixed_rate/' . $name;
            $data->file = $fileName;
        }
        $data->user_id = \Auth::user()->id;
        $data->save();

        //--- Check Chat
        $chat = Chat::where('project_id', $data['id'])->first();
        $randomString = Str::random(7);
        if(!$chat) {
            $admin = Admin::first();

            $skills = Skill::whereIn('id', $this->data['skills'])->pluck('title', 'id')->toArray();

            $chat = Chat::create([
                'project_id' => $data['id'],
                'chat_type' => 'Group',
                'channel' => $randomString,
                'title' => $data['title']
            ]);
            ChatUser::create([
                'chat_id' => $chat['id'],
                'user_id'  => $data['user_id'],
                'user_type' => 'User'
            ]);
            ChatUser::create([
                'chat_id' => $chat['id'],
                'user_id'  => 1,
                'user_type' => 'Admin'
            ]);
            $message = '<p class="mb-1"><strong>Project name: </strong><span class="mb-0">'.$data['title'].'</span></p>'; 
            $message .= '<p class="mb-1"><strong>Technology: </strong><span class="mb-0">'.implode(',',$skills).'</span></p>'; 
            $message .= '<p class="mb-1"><strong>Project Timeline: </strong><span class="mb-0">'.$data['timeline'].'</span></p>'; 
            $message .= '<p class="mb-1"><strong>Job Description: </strong><span class="mb-0">'.$data['description'].'</span></p>'; 
            $message .= '<p class="mb-1"><strong>Estimated Price: </strong><span class="mb-0">'.$data['estimated_price'].'</span></p>'; 
            $message .= '<p class="mb-1"><strong>Payment Milestone: </strong><span class="mb-0">'.$data['timeline'].'</span></p>'; 
            if(!empty($data['file']))
                $message .= '<p class="mb-1"><strong>Upload File: </strong><span class="mb-0"><a href="'. $data['file'] .'"><u>File</u></a></span></p>';
            $message .= '<br><br><br>';
            $message .= '<p class="mb-1"><strong class="text-danger">Note: </strong>Personal manager will contact you in few minute</p>'; 
            
            ChatMessage::create([
                'chat_id' => $chat['id'],
                'user_id' => auth()->user()->id,
                'message' =>  $message,
                'message_type' => 'Text',
                'send_by' => $admin['id'], 
                'is_seen' => '0'
            ]);
        }
    }
}
