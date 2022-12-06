<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\apiKeyInject;
use Illuminate\Support\Facades\Session;

class Reply extends Component
{
    use apiKeyInject;

    public $topic_id, $comment_id, $author_id, $score, $body;
    public $form = [
        'comment_id' => '',
        'commentoncomment' => 'ss',
    ];

    public function destroyComment($comment_id)
    {
        $response = $this->injectApi()->delete(getenv('API_SITE') . '/comments/' . $comment_id);
        session()->flash('message', $response['message']);
        return redirect('post/' . $this->topic_id);
    }

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
            return redirect('post/' . $this->topic_id);
        } else {
            session()->flash('message', $response['message']);
        }
    }

    public function mount($topic_id, $comment)
    {
        $this->form['comment_id'] = $comment['id'];
        $this->form['commentoncomment'] = $comment['body'];
        $this->comment_id = $comment['id'];
        $this->author_id = $comment['author_id'];
        $this->score = $comment['score'];
        $this->body = $comment['body'];
        $this->topic_id = $topic_id;
    }


    public function render()
    {
        return view('livewire.reply');
    }
}
