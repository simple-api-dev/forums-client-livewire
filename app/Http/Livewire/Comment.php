<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Traits\apiKeyInject;

class Comment extends Component
{

    use apiKeyInject;
    public $topid_id, $comment;
    protected $listeners = ['$refresh'];

    public $showDiv = false;
    public $form = [
        'comment_id' => '',
        'body' => '',
    ];

  
    public function addComment($comment_id)
    {
        $this->validate([
            'form.body' => ['required', 'string', 'max:255'],
        ]);

        $response = $this->injectApi()->post(getenv('API_SITE') . '/comments/type/comment/' . $comment_id, [
            'body' => $this->form['body'],
            'status' => 'Active',
            'author_id' =>  Session::get('author_id'),
        ]);
        $this->emit('$refresh');
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


    public function mount($topic_id, $comment)
    {
        $this->topic_id = $topic_id;
        $this->comment = json_decode(json_encode ( $comment ) , true);
    }


    public function render()
    {
        return view('livewire.comment');
    }
}
