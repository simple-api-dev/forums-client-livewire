<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\apiKeyInject;
use Illuminate\Support\Facades\Session;

class Comment extends Component
{
    use apiKeyInject;
    public $topic_id, $comment;
    public $form = [
        'body' => '',
    ];
    protected $listeners = ['$refresh'];
    public $showDiv = false;


    public function addComment($comment_id)
    {
        $this->validate([
            'form.body' => ['required', 'string'],
        ]);

        $response = json_decode($this->injectApi()->post(getenv('API_SITE') . '/comments/type/comment/' . $comment_id, [
            'body' => $this->form['body'],
            'status' => 'Active',
            'author_id' =>  Session::get('author_id'),
        ]), true);
        array_push($this->comment["comments"], $response);
        session()->flash('message', 'Comment successfully added.');
        $this->form['body'] = '';
        $this->showDiv = false;
    }


    public function upvoteComment($comment_id)
    {
        $response = $this->injectApi()->post(getenv('API_SITE') . '/votes/up/comment/' . $comment_id, [
            'author_id' =>  Session::get('author_id'),
        ]);
        if ($response->getStatusCode() <> 200) {
            session()->flash('message', $response['message']);
        }

        if (isset($response['points'])) {
            $this->comment['score'] = $response['points'];
        }
    }


    public function downvoteComment($comment_id)
    {
        $response = $this->injectApi()->post(getenv('API_SITE') . '/votes/down/comment/' . $comment_id, [
            'author_id' =>  Session::get('author_id'),
        ]);
        if ($response->getStatusCode() <> 200) {
            session()->flash('message', $response['message']);
        }

        if (isset($response['points'])) {
            $this->comment['score'] = $response['points'];
        }
    }


    public function mount($topic_id, $comment)
    {
        $this->topic_id = $topic_id;
        $this->comment = $comment;
    }


    public function render()
    {
        return view('livewire.comment');
    }
}