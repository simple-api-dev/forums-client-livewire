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
        'body' => '',
        'url' => '',
        'type' => 'Post',
        'status' => 'Active',
    ];
    public $showDiv = false;

    public function addTopic()
    {
        $this->validate([
            'form.title' => ['required', 'string'],
            'form.body' => ['required', 'string'],
        ]);

        $response = json_decode($this->injectApi()->post(getenv('API_SITE') . '/forums/17/topics', [
            'title' => $this->form['title'],
            'body' => $this->form['body'],
            'status' => $this->form['status'],
            'type' => $this->form['type'],
            'author_id' => Session::get('author_id'),
            'tags' => ['red', 'blue', 'green'],
        ]), true);

        array_push($this->topics, $response);
        session()->flash('message', 'Topic successfully added.');
        $this->form['title'] = '';
        $this->form['body'] = '';
        $this->form['url'] = '';
        $this->showDiv = false;
    }


    public function mount()
    {

        $response = json_decode($this->injectApi()->get(getenv('API_SITE') . '/forums/forum/topics'), true);
        $this->topics = $response;
    }



    public function render()
    {
        return view('livewire.topics');
    }
}

