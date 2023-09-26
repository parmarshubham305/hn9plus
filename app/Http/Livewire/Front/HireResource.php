<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Skill;

class HireResource extends Component
{
    public $groupfilters = [], $selectedFilters = [];

    protected $filters = [];

    public function mount() {
        $this->groupfilters = Skill::get()->groupBy('type')->toArray();
        $this->filters = Skill::paginate(18);
    }

    public function filter() {
        $keys = array_filter($this->selectedFilters, function($element) {
            return $element == true;
          });;
        $this->filters = Skill::whereIn('id', array_keys($keys))->paginate();
    }

    public function render()
    {
        return view('livewire.front.hire-resource')->with('filters', $this->filters);
    }
}
