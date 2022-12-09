<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\apiKeyInject;
use Illuminate\Support\Facades\Session;

class Topic extends Component
{
    use apiKeyInject;
    public  $topic;
    public $form = [
        'body' => '',
    ];


    public function addComment($id)
    {
        $this->validate([
            'form.body' => ['required', 'string', 'max:255'],
        ]);

        $response = json_decode($this->injectApi()->post(getenv('API_SITE') . '/comments/type/topic/' . $id, [
            'body' => $this->form['body'],
            'status' => 'Active',
            'author_id' =>  Session::get('author_id'),
        ]), true);
         array_push($this->topic['comments'], $response);
         session()->flash('message', 'Comment successfully added.');
         $this->form['body'] = '';
    }


    public function upvoteTopic($id)
    {
        $response = json_decode($this->injectApi()->post(getenv('API_SITE') . '/votes/up/topic/' . $id, [
            'author_id' =>  Session::get('author_id'),
        ]),true);
        if (isset($response['points'])) {
            $this->topic['score'] = $response['points'];
        }
    }


    public function downvoteTopic($id)
    {
        $response = json_decode($this->injectApi()->post(getenv('API_SITE') . '/votes/down/topic/' . $id, [
            'author_id' =>  Session::get('author_id'),
        ]),true);
        if (isset($response['points'])) {
            $this->topic['score'] = $response['points'];
        }
    }


    public function mount($topic_slug)
    {
        $response = json_decode($this->injectApi()->get(getenv('API_SITE') . '/topics/' . $topic_slug), true);
        $this->topic = $response;
    }


    public function render()
    {
        return view('livewire.topic');
    }
}