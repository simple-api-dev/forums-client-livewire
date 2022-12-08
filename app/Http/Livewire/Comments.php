<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\apiKeyInject;
use Illuminate\Support\Facades\Session;

class Comments extends Component
{
    use apiKeyInject;
    public $topic_id, $comments;
    public $form = [
        'body' => '',
    ];


    public function addTopicComment()
    {
        $this->validate([
            'form.body' => ['required', 'string', 'max:255'],
        ]);

        $response = json_decode($this->injectApi()->post(getenv('API_SITE') . '/comments/type/topic/' . $this->topic_id, [
            'body' => $this->form['body'],
            'status' => 'Active',
            'author_id' =>  Session::get('author_id'),
        ]));

         $response = (array) $response;
         array_push($this->comments, $response);
         dd($this->comments);
        //  COMMENTS is missing from response
    }


    public function mount($topic_id)
    {
        $this->topic_id = $topic_id;
        $this->comments = json_decode($this->injectApi()->get(getenv('API_SITE') . '/topics/' . $topic_id . '/comments'));
    }


    public function render()
    {
        return view('livewire.comments');
    }
}