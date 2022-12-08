<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\apiKeyInject;
use Illuminate\Support\Facades\Session;

class Topics extends Component
{
    use apiKeyInject;
    public $topics;


    public $form = [
        'title' => '',
    ];

    
    public function addTopic()
    {
        $this->validate([
            'form.title' => ['required', 'string', 'max:255'],
        ]);

        $response = json_decode($this->injectApi()->post(getenv('API_SITE') . '/forums/17/topics', [
            'title' => $this->form['title'],
            'body' => 'Body',
            'status' => 'Active',
            'type' => 'Post',
            'author_id' => Session::get('author_id'),
            'tags' => ['red', 'blue', 'green'],
        ]), true);

        array_push($this->topics, $response);
        session()->flash('message', 'Topic successfully added.');
        $this->form['title'] = '';
    }
    
    
    public function mount()
    {
       $this->topics = json_decode($this->injectApi()->get(getenv('API_SITE') . '/forums/forum/topics'), true);
    }


    public function render()
    {
        return view('livewire.topics');
    }
}
