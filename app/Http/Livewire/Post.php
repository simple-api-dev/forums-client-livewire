<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\apiKeyInject;
use Illuminate\Support\Facades\Session;

class Post extends Component
{
    use apiKeyInject;
    public $comments = [];
    public $topic_id = '';
    public $form = [
        'comment' => 'aaa',
    ];

    public function submit()
    {
        $this->validate([
            'form.comment' => ['required', 'string', 'max:255'],
        ]);

        $response = $this->injectApi()->post(getenv('API_SITE') . '/comments/type/topic/' . $this->topic_id, [
            'body' => $this->form['comment'],
            'status' => 'Active',
            'author_id' =>  Session::get('author_id'),
        ]);

        if ($response->getStatusCode() == 200) {
            session()->flash('message', 'Comment added successfully');
        } else {
            session()->flash('message', $response['message']);
        }
    }

    public function mount($topic_id)
    {
        $this->topic_id = $topic_id;
        $this->comments = json_decode($this->injectApi()->get(getenv('API_SITE') . '/topics/' . $topic_id . '/comments'));
    }


    public function render()
    {
        return view('livewire.post');
    }
}
