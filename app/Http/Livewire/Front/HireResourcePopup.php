<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Skill;
use LivewireUI\Modal\ModalComponent;

class HireResourcePopup extends ModalComponent
{
    protected $values;
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
        $this->values = Skill::paginate(2);
    }
    public function render()
    {
        return view('livewire.front.hire-resource-popup');
    }
}
