<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\apiKeyInject;

class Post extends Component
{

    use apiKeyInject;
    public $comments = [];

    public function mount($topic_id)
    {
        $this->comments = json_decode($this->injectApi()->get(getenv('API_SITE') . '/topics/' . $topic_id . '/comments'));
    }


    public function render()
    {
        return view('livewire.post');
    }
}
