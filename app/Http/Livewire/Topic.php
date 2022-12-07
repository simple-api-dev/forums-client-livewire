<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\apiKeyInject;
use Illuminate\Support\Facades\Session;
use stdClass;

class Topic extends Component
{
    use apiKeyInject;
    public  $topic;
    public $url;

    
    public function destroy($id)
    {
        $this->emitUp('destroyTopic', ['id' => $id]);
    }


    public function upvoteTopic($id)
    {
        $response = $this->injectApi()->post(getenv('API_SITE') . '/votes/up/topic/' . $id, [
            'author_id' =>  Session::get('author_id'),
        ]);

        if (isset($response['points'])) {
            $this->score = $response['points'];
        }
        $this->emit('$refresh');
    }


    public function downvoteTopic($id)
    {
        $response = $this->injectApi()->post(getenv('API_SITE') . '/votes/down/topic/' . $id, [
            'author_id' =>  Session::get('author_id'),
        ]);
        if (isset($response['points'])) {
            $this->score = $response['points'];
        }
        $this->emit('$refresh');
    }


    public function mount($topic)
    {
        $this->topic = (array) $topic;
        $this->url = url()->current();
    }


    public function render()
    {
        return view('livewire.topic');
    }
}
