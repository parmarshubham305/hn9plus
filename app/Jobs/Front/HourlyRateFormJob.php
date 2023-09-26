<?php

namespace App\Jobs\Front;

use App\Models\ProjectQuote;

class HourlyRateFormJob
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
        $data = ProjectQuote::firstOrNew(['id' => $this->data['id']]);
        
        $this->data['quote_type'] = 'Hourly Rate';
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
            $destinationPath = public_path('/uploads/hourly_rate');
            $icon->move($destinationPath, $name);
            $fileName = 'uploads/hourly_rate/' . $name;
            $data->file = $fileName;
        }

        $data->user_id = \Auth::user()->id;
        $data->save();
    }
}
