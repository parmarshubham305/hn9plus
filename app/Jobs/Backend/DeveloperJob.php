<?php

namespace App\Jobs\Backend;
use App\Models\Developer;

class DeveloperJob
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
        $data = Developer::firstOrNew(['id' => $this->data['id']]);
        
        $data->fill($this->data);

        if(isset($this->data['image'])) {
            if($this->data['image'] && !empty($this->data['_method'] ) && $this->data['_method'] == 'PATCH' && file_exists(public_path($data['image']))) {
                
                try {
                    if($data['image'] != '') {
                        unlink(public_path($data['image']));
                    }
                } catch (\Throwable $e) {
                    // return false;
                }
                
            }
            $image = $this->data['image'];
            $name = time(). '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/developers');
            $image->move($destinationPath, $name);
            $fileName = 'uploads/developers/' . $name;
            $data->image = $fileName;
        }

        $data->save();
    }
}