<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\apiKeyInject;
use Illuminate\Support\Facades\Session;

class Topics extends Component
{
    use apiKeyInject;

    public $topics;
    protected $listeners = ['$refresh', 'destroyTopic'];


    public function addTopic()
    {
        $response = json_decode($this->injectApi()->post(getenv('API_SITE') . '/forums/17/topics', [
            'title' => 'Topic',
            'body' => 'Topic Body',
            'status' => 'Active',
            'type' => 'Post',
            'author_id' => Session::get('author_id'),
            'tags' => ['red','blue','green'],
        ]));

        array_push($this->topics, $response);
        $this->emit('$refresh');
    }


    public function mount()
    {
        $this->topics = json_decode($this->injectApi()->get(getenv('API_SITE') . '/forums/forum/topics'));
    }


    public function render()
    {
        return view('livewire.topics');
    }
}
