<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class Login extends ModalComponent
{
    public $email, $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];
    
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
        return '5xl';
    }

    public function submit()
    {
        $this->validate();

        if(\Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
                $this->closeModal();
                $this->emit('loginSuccess');
        }else{
            $this->addError('email', 'Credentials are not matched with our records!');
        }
    }

    public function render()
    {
        return view('livewire.front.login');
    }
}
