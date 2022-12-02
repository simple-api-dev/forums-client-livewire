<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Logout extends Component
{

    public function logout()
    {
        Http::post(getenv('AUTH_SITE') . '/logout/?apikey=' . getenv('AUTH_APIKEY'), ['token' => session()->get('key'),]);
        session()->flush();
        session()->regenerate();
        return redirect(route('home'));
    }

    public function render()
    {
        return view('livewire.logout');
    }
}



