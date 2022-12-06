<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Session;
use App\Traits\apiKeyInject;

class Comment extends Component
{

    use apiKeyInject;
    public $topid_id, $comment_id, $body, $status, $author_id, $reports, $score, $comments;





    public function destroyComment($comment_id)
    {
        $response = $this->injectApi()->delete(getenv('API_SITE') . '/comments/' . $comment_id);
        session()->flash('message', $response['message']);
        return redirect('post/' . $this->topic_id);
    }


    public function reportComment($comment_id)
    {
        $response = $this->injectApi()->post(
            getenv('API_SITE') . '/reports/type/comment/' . $comment_id,
            [
                'author_id' => Session::get('author_id'),
                'type' => 'Offensive'
            ]
        );
        if ($response->getStatusCode() <> 200) {
            session()->flash('message', $response['message']);
        }
        return redirect('post/' . $this->topic_id);
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
        $this->reports = $response['reports'];
        $this->score = $response['score'];
        $this->comments = $response['comments'];
    }



    public function render()
    {
        return view('livewire.comment');
    }
}
