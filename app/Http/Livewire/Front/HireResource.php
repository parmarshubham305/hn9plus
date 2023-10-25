<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Skill;
use App\Models\ProjectHiredResource;
use Illuminate\Support\Arr;

class HireResource extends Component
{
    public $groupfilters = [], $filters = [], $selectedFilters = [], $hiredResources = [], $projectId;

    protected $listeners = ['setHiredResources'];

    public function mount() {
        $this->groupfilters = Skill::get()->groupBy('type')->toArray();
        $this->filters = Skill::get()->toArray();
    }

    public function setHiredResources($data) {
        $this->hiredResources = array_merge($this->hiredResources, $data);
    }

    public function removeHiredResource($key) {
        $this->hiredResources = array_splice($this->hiredResources, $key, 1);
    }

    public function filter() {
        $keys = array_filter($this->selectedFilters, function($element) {
            return $element == true;
        });
        if(empty($keys)) {
            $this->filters = Skill::get()->toArray();
        } else {
            $this->filters = Skill::whereIn('id', array_keys($keys))->get()->toArray();
        }
    }

    public function hired() {
        $filtered = [];
        foreach ($this->hiredResources as $key => $value) {
            $filtered[] = Arr::only($value, ['id', 'name', 'image', 'designation', 'hours', 'months']);
        }
        
        ProjectHiredResource::updateOrCreate([
            'project_quotes_id' => $this->projectId,
        ],[
            'project_quotes_id' => $this->projectId,
            'resources' => json_encode($filtered)
        ]);

        return redirect()->route('front.dashboard.index');
    }

    public function render()
    {
        return view('livewire.front.hire-resource')->with('filters');
    }
}
