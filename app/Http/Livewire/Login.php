<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\Rules;


class Login extends Component
{
    public $form = [
        'email' => '',
        'password' => '',
    ];



    public function submit()
    {
        $this->validate([
            'form.email' => ['required', 'string', 'email', 'max:255'],
            'form.password' => ['required', Rules\Password::defaults()],
        ]);

        $response = HTTP::post(getenv('AUTH_SITE') . '/login/?apikey=' . getenv('AUTH_APIKEY'), [
            'integration_id' => getenv('INTEGRATION_ID'),
            'email' => $this->form['email'],
            'password' => $this->form['password'],
        ]);

        if ($response->getStatusCode() == 200) {
            session()->regenerate();
            session()->put('token', $response['token']);
            session()->put('author_id', $response['username']);
            return redirect(route('home'));
        } else {
            session()->flash('message', $response['message']);
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}
