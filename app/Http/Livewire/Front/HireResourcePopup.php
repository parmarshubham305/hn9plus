<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Skill;
use LivewireUI\Modal\ModalComponent;
use App\Models\Developer;
use App\Models\DeveloperSkill;

class HireResourcePopup extends ModalComponent
{
    public Skill $skill;
    public $resources = [], $selectedResources = [], $hiredResources = [];
    public static function modalMaxWidth(): string
    {
        // 'sm'
        // 'md'
        // 'lg'
        // 'xl'
        // '2xl'
        // '3xl'
        // '4xl'
        // '5xl'
        // '6xl'
        // '7xl'
        return '7xl';
    }

    public function mount() {
        $ids = Skill::where('parent_id', $this->skill['id'])->pluck('id', 'id')->toArray();
        $ids[] = $this->skill['id'];
        $developerIds = DeveloperSkill::whereIn('skill_id', $ids)->pluck('developer_id', 'developer_id')->toArray();
        $resources = Developer::whereIn('id', $developerIds)->get();
        $hiredResourcesIds = array_column($this->hiredResources, 'id');
        
        $this->resources = collect($resources)->map(function ($item) use($hiredResourcesIds) {
            $hiredResourcesIndex = array_search($item->id, $hiredResourcesIds);
            if($hiredResourcesIndex) {
                $item->hours = $this->hiredResources[$hiredResourcesIndex]['hours'];
                $item->months = $this->hiredResources[$hiredResourcesIndex]['months'];
                $this->selectedResources[] = $item->id;
            } else {
                $item->hours = 0;
                $item->months = 0;
            }
            return $item;
        });
    }

    public function addResource($id) {
        $this->selectedResources[] =  $id;
    }

    public function plusHours($key) {
        $this->resources = collect($this->resources)->map(function ($item, $index) use ($key) {
            if($index == $key) {
                $item['hours'] += 1;
            }
            return $item;
        });
    }

    public function minusHours($key) {
        $this->resources = collect($this->resources)->map(function ($item, $index) use ($key) {
            if($index == $key && $item['hours'] > 1) {
                $item['hours'] -= 1;
            }
            return $item;
        });
    }

    public function plusMonth($key) {
        $this->resources = collect($this->resources)->map(function ($item, $index) use ($key) {
            if($index == $key) {
                $item['months'] += 1;
            }
            return $item;
        });
    }

    public function minusMonth($key) {
        $this->resources = collect($this->resources)->map(function ($item, $index) use ($key) {
            if($index == $key && $item['months'] > 1) {
                $item['months'] -= 1;
            }
            return $item;
        });
    }

    public function submit() 
    {
        $selectedkeys = $this->selectedResources;
        $data = collect($this->resources)->filter(function ($item, $index) use ($selectedkeys) {
            if(in_array($index, $selectedkeys)) {
                return $item;
            } else {
                return false;
            }
        })->reject(function ($value) {
            return $value === false;
        });
        $this->emit('setHiredResources', $data);
        $this->closeModal();
    }

    public function render() {
        return view('livewire.front.hire-resource-popup');
    }
}
