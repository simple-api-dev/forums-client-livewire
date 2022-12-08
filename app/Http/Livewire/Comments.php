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
    public $showDiv = false;
    public $form2 = [
        'comment_id' => '',
        'body' => '',
    ];

    protected $listeners = ['$refresh'];


    public function addTopicComment()
    {
        $this->validate([
            'form.body' => ['required', 'string', 'max:255'],
        ]);

        $response = json_decode($this->injectApi()->post(getenv('API_SITE') . '/comments/type/topic/' . $this->topic_id, [
            'body' => $this->form['body'],
            'status' => 'Active',
            'author_id' =>  Session::get('author_id'),
        ]), true);
         array_push($this->comments, $response);
         session()->flash('message', 'Comment successfully added.');
         $this->form['body'] = '';
    }


    public function addComment($comment_id)
    {
        $this->validate([
            'form2.body' => ['required', 'string', 'max:255'],
        ]);

        $response = json_decode($this->injectApi()->post(getenv('API_SITE') . '/comments/type/comment/' . $comment_id, [
            'body' => $this->form2['body'],
            'status' => 'Active',
            'author_id' =>  Session::get('author_id'),
        ]));

        $response = (array) $response;
        array_push($this->comment, $response);
        session()->flash('message', 'Comment successfully added.');
        $this->emitUp('$refresh');
    }


    public function destroyComment($comment_id)
    {
        $response = $this->injectApi()->delete(getenv('API_SITE') . '/comments/' . $comment_id);
        session()->flash('message', $response['message']);
        return redirect()->to('post/' . $this->topic_id);
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
            $this->score = $response['points'];
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
            $this->score = $response['points'];
        }
    }


    public function mount($topic_id)
    {
        $this->topic_id = $topic_id;
        $this->comments =  json_decode($this->injectApi()->get(getenv('API_SITE') . '/topics/' . $topic_id . '/comments'), true);
    }


    public function render()
    {
        return view('livewire.comments');
    }
}