<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use Auth;

class Header extends Component
{
    public $user;

    protected $listeners = ['loginSuccess'];
    
    public function mount()
    {
        $this->user = Auth::user();
    }

    public function loginSuccess()
    {
        $this->user = Auth::user();
    }
    
    public function render()
    {
        return view('livewire.front.header');
    }
}
