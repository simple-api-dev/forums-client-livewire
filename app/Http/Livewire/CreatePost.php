<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\apiKeyInject;


class CreatePost extends Component
{

    use apiKeyInject;

    public $form = [
        'title' => '',
        'body' => '',
        'type' => 'Post',
        'status' => 'Draft',
        'author_id' => '',
        'tags' => '',
    ];



    public function submit()
    {
        $this->validate([
            'form.title' => ['required'],
            'form.body' => ['required'],
            'form.type' => ['required'],
            'form.status' => ['required'],
            'form.author_id' => ['required']
        ]);

        $response = json_decode($this->injectApi()->post(getenv('API_SITE') . '/forums/17/topics', [
            'title' => $this->form['title'],
            'body' => $this->form['body'],
            'status' => $this->form['status'],
            'type' => $this->form['type'],
            'author_id' => $this->form['author_id'],
            'tags' => [],
        ]));

        if (isset($response->message)) {
            session()->flash('message', $response->message);
        } else {
            session()->flash('message', 'New topic created');
            return redirect(route('home'));
        }
    }


    public function render()
    {
        return view('livewire.create-post');
    }
}
