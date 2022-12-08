<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\apiKeyInject;
use Illuminate\Support\Facades\Session;

class Topic extends Component
{
    use apiKeyInject;
    public  $topic;


    public function upvoteTopic($id)
    {
        $response = $this->injectApi()->post(getenv('API_SITE') . '/votes/up/topic/' . $id, [
            'author_id' =>  Session::get('author_id'),
        ]);
        if (isset($response['points'])) {
            $this->topic['score'] = $response['points'];
        }
    }


    public function downvoteTopic($id)
    {
        $response = $this->injectApi()->post(getenv('API_SITE') . '/votes/down/topic/' . $id, [
            'author_id' =>  Session::get('author_id'),
        ]);
        if (isset($response['points'])) {
            $this->topic['score'] = $response['points'];
        }
    }


    public function mount($topic)
    {
        $this->topic = (array) $topic;
    }


    public function render()
    {
        return view('livewire.topic');
    }
}
