<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\apiKeyInject;
use Illuminate\Support\Facades\Session;


class Topic extends Component
{
    use apiKeyInject;
    public $topic_id, $topic_slug, $title, $body, $author_id, $topic_reports, $status;
    public string $score;


    public function destroy($id)
    {
        $response = $this->injectApi()->delete(getenv('API_SITE') . '/topics/' . $id);
        if ($response->getStatusCode() <> 200) {
            session()->flash('message', $response['message']);
        }
        return redirect(route('home'));
    }


    public function report($id)
    {
        $response = $this->injectApi()->post(
            getenv('API_SITE') . '/reports/type/topic/' . $id,
            [
                'author_id' => Session::get('author_id'),
                'type' => 'Offensive'
            ]
        );
        if ($response->getStatusCode() <> 200) {
            session()->flash('message', $response['message']);
        }
        return redirect(route('home'));
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


    public function mount($slug)
    {
        $response = $this->injectApi()->get(getenv('API_SITE') . '/topics/' . $slug);
        $this->topic_id = $response['id'];
        $this->topic_slug = $response['slug'];
        $this->score = $response['score'];
        $this->title = $response['title'];
        $this->body = $response['body'];
        $this->author_id = $response['author_id'];
        $this->topic_reports = $response['reports'];
        $this->status = $response['status'];
    }


    public function render()
    {
        return view('livewire.topic');
    }
}
