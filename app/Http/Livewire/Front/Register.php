<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use App\Models\User;
use Hash;

class Register extends ModalComponent
{
    public $firstName, $lastName, $email, $password, $password_confirmation;

    protected $rules = [
        'firstName' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
    ];

    public static function modalMaxWidth(): string
    {
        return '6xl';
    }

    public function submit() 
    {
        $this->validate();

        $this->password = Hash::make($this->password); 

        User::create([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'password' => $this->password
        ]);
        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.front.register');
    }
}
