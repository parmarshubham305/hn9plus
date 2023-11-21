<?php

namespace App\Jobs\Backend;
use App\Models\ProjectManager;

class ProjectManagerJob
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
        $data = ProjectManager::firstOrNew(['id' => $this->data['id']]);
        
        if(!isset($this->data['status'])) {
            $this->data['status'] = '0';
        } else {
            $this->data['status'] = '1';
        }

        if(isset($this->data['_method']) && $this->data['_method'] == 'PATCH' && $this->data['password'] == '') {
            unset($this->data['password']);
        } else {
            $this->data['password'] = \Hash::make($this->data['password']);
        }
        
        $data->fill($this->data);

        $data->save();
    }
}
