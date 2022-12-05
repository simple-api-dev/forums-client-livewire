<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\apiKeyInject;
use Illuminate\Support\Facades\Session;

class Home extends Component
{
    use apiKeyInject;
    public $topics = [];
    public $tags = [];




    
    public function mount()
    {
        $this->topics = json_decode($this->injectApi()->get(getenv('API_SITE') . '/forums/' . 'forum' . '/topics'));
        $this->tags = json_decode($this->injectApi()->get(getenv('API_SITE') . '/forums/' . 17 . '/tags'));
    }


    public function render()
    {
        return view('livewire.home', ['topics' => $this->topics, 'tags' => $this->tags]);
    }
}
