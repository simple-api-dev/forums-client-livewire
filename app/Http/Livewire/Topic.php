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
    


    // public $topic_id, $topic_slug, $title, $body, $author_id, $topic_reports, $status;
    // public string $score;

    public function showpost()
    {
        return redirect()->to('/post/' . $this->topic_id);
    }


    public function destroy($id)
    {
        $response = $this->injectApi()->delete(getenv('API_SITE') . '/topics/' . $id);
        if ($response->getStatusCode() <> 200) {
            session()->flash('message', $response['message']);
        }
        return redirect()->to('/');
    }


    public function upvoteTopic($id)
    {
        $response = $this->injectApi()->post(getenv('API_SITE') . '/votes/up/topic/' . $id, [
            'author_id' =>  Session::get('author_id'),
        ]);

        if ($response->getStatusCode() <> 200) {
            session()->flash('message', $response['message']);
        }

        if (isset($response['points'])) {
            $this->score = $response['points'];
        }
    }


    public function downvoteTopic($id)
    {
        $response = $this->injectApi()->post(getenv('API_SITE') . '/votes/down/topic/' . $id, [
            'author_id' =>  Session::get('author_id'),
        ]);
        if ($response->getStatusCode() <> 200) {
            session()->flash('message', $response['message']);
        }

        if (isset($response['points'])) {
            $this->score = $response['points'];
        }
    }


    public function mount($topic)
    {
        $this->topic =  (array) $topic;
    }


    public function render()
    {
        return view('livewire.topic');
    }
}
