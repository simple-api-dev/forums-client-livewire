<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Traits\apiKeyInject;

class Comment extends Component
{

    use apiKeyInject;
    public $topid_id, $comment_id, $body, $status, $author_id, $score, $comments, $commentable_type;
    public $showDiv = false;
    public $form = [
        'comment_id' => '',
        'commentoncomment' => '',
    ];

  
    public function submit()
    {
        $this->validate([
            'form.commentoncomment' => ['required', 'string', 'max:255'],
        ]);

        $response = $this->injectApi()->post(getenv('API_SITE') . '/comments/type/comment/' . $this->form['comment_id'], [
            'body' => $this->form['commentoncomment'],
            'status' => 'Active',
            'author_id' =>  Session::get('author_id'),
        ]);

        if ($response->getStatusCode() == 200) {
            session()->flash('message', 'Comment on Comment added successfully');
            return redirect()->to('post/' . $this->topic_id);
        } else {
            session()->flash('message', $response['message']);
        }
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


    public function mount($topic_id, $comment_id)
    {
        $response = $this->injectApi()->get(getenv('API_SITE') . '/comments/' . $comment_id);
        $this->topic_id = $topic_id;
        $this->comment_id = $comment_id;
        $this->body = $response['body'];
        $this->status = $response['status'];
        $this->author_id = $response['author_id'];
        $this->score = $response['score'];
        $this->comments = $response['comments'];
        $this->commentable_type = $response['commentable_type'];
        $this->form['comment_id'] = $comment_id;
    }


    public function render()
    {
        return view('livewire.comment');
    }
}
