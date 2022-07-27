<?php

namespace App\Http\Livewire\Authentication;

use App\Actions\User\RegisterUserAction;
use Livewire\Component;

class Register extends Component
{
    public $firstName;

    public $lastName;

    public $email;

    public $password;

    public function render()
    {
        return view('livewire.authentication.register');
    }

    public function register()
    {
        $this->validate();

        $user = resolve(RegisterUserAction::class)->register(
            firstName: $this->firstName,
            lastName: $this->lastName,
            email: $this->email,
            password: $this->password,
        );

        auth()->loginUsingId($user->id, true);

        return redirect()->route('show.catalogs');
    }
  
    protected function rules(): array
    {
        return [
            'firstName' => ['required', 'string', 'between:1,255'],
            'lastName' => ['required', 'string', 'between:1,255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'between:8,255'],
        ];
    }
}
