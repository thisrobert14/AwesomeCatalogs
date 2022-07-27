<?php

namespace App\Http\Livewire\Authentication;

use App\Models\User;
use Livewire\Component;

class Login extends Component
{
    public $email = '';

    public $password = '';

    public $rememberMe = true;

    public function render()
    {
        return view('livewire.authentication.login');
    }

    public function login()
    {
        $this->validate();

        $credentials=[
            'email' => $this->email,
            'password' => $this->password,
        ];

        if(auth()->attempt($credentials, $this->rememberMe)){
            request()->session()->regenerate();
            $user = auth()->user();
        }

        $user = User::where('email', $this->email)->first();
        if ($user) {
            return redirect()->route('show.catalogs');
        }

        $this->addError('email', 'The provided credentials do not match our records.');

    }

    protected function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'string', 'between:1,255'],
        ];
    }
}
