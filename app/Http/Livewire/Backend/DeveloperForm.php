<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;

class DeveloperForm extends Component
{
    public $experiences = [], $educations = [];

    public function mount()
    {
        // if (old('category_id')) {
        //     $this->categoryId = old('category_id');
        //     $this->getoption($this->categoryId);
        // }
        if(old('experience') || old('education')) {
            $this->experiences = json_decode(old('experience'));
            $this->educations = json_decode(old('education'));
        }
        
        if(empty($this->experiences) && old('experience') == '' && old('education') == '') {
            $this->experiences[] = [
                'company' => '',
                'description' => '',
                'from_date' => '',
                'to_date' => '',
            ];
            $this->educations[] = [
                'name' => '',
                'passout_year' => '',
                'percentage' => '',
            ];
        }
    }

    public function addExperience() {
        $this->experiences[] = [
            'company' => '',
            'description' => '',
            'from_date' => '',
            'to_date' => '',
        ];
    }

    public function removeExperience($key) {
        array_splice($this->experiences, $key, 1);
    }

    public function addEducation() {
        $this->educations[] = [
            'name' => '',
            'passout_year' => '',
            'percentage' => '',
        ];
    }

    public function removeEducation($key) {
        array_splice($this->educations, $key, 1);
    }

    public function render()
    {
        return view('livewire.backend.developer-form');
    }
}
