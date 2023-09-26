<?php

namespace App\Jobs\Backend;

use App\Models\Skill;

class SkillJob
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
        $data = Skill::firstOrNew(['id' => $this->data['id']]);
        
        if(!isset($this->data['status'])) {
            $this->data['status'] = '0';
        } else {
            $this->data['status'] = '1';
        }
        
        $data->fill($this->data);

        if(isset($this->data['logo'])) {
            if($this->data['logo'] && !empty($this->data['_method'] ) && $this->data['_method'] == 'PATCH' && file_exists(public_path($data['logo']))) {
                
                try {
                    if($data['logo'] != '') {
                        unlink(public_path($data['logo']));
                    }
                } catch (\Throwable $e) {
                    // return false;
                }
                
            }
            $logo = $this->data['logo'];
            $name = time(). '.' . $logo->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/backend/skills_logos');
            $logo->move($destinationPath, $name);
            $fileName = 'uploads/backend/skills_logos/' . $name;
            $data->logo = $fileName;
        }

        $data->save();
    }
}
