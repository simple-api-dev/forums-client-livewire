<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Reply extends Component
{
    public $comment_id, $author_id, $score, $body;
    public $form = [
        'comment_id' => '',
        'commentoncomment' => 'ss',
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
            return redirect('post/' . $this->topic_id);
        } else {
            session()->flash('message', $response['message']);
        }
    }

    public function mount($comment)
    {
        $this->form['comment_id'] = $comment['id'];
        $this->form['commentoncomment'] = $comment['body'];
        $this->comment_id = $comment['id'];
        $this->author_id = $comment['author_id'];
        $this->score = $comment['score'];
        $this->body = $comment['body'];
    }


    public function render()
    {
        return view('livewire.reply');
    }
}
