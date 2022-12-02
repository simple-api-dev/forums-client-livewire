<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\apiKeyInject;

class Home extends Component
{
    use apiKeyInject;
    public $topics = [];

    public function mount()
    {
        $this->topics = json_decode($this->injectApi()->get(getenv('API_SITE') . '/forums'));
    }


    public function render()
    {
        return view('livewire.home')->with('topics', $this->topics);
    }
}
