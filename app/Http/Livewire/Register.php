<?php

namespace App\Http\Livewire;

use App\Traits\apiKeyInject;
use Illuminate\Validation\Rules;
use Livewire\Component;


class Register extends Component
{
    use apiKeyInject;

    public $form = [
        'name' => '',
        'email' => '',
        'password' => '',
        'password_confirmation' => '',
    ];


    public function submit()
    {
        $this->validate([
            'form.name' => ['required', 'string', 'max:255'],
            'form.email' => ['required', 'string', 'email', 'max:255'],
            'form.password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $response = $this->injectApi()->post(getenv('AUTH_SITE') . '/register', [
            'integration_id' => getenv('INTEGRATION_ID'),
            'name' => $this->form['name'],
            'email' => $this->form['email'],
            'password' => $this->form['password'],
        ]);

        session()->flash('message', $response['message']);
    }

    public function render()
    {
        return view('livewire.register');
    }
}
