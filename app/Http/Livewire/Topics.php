<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\apiKeyInject;
use Illuminate\Support\Facades\Session;

class Topics extends Component
{
    use apiKeyInject;

    public $topics;
    protected $listeners = ['$refresh', 'destroyTopic'];


    public function addTopic()
    {
        $response = json_decode($this->injectApi()->post(getenv('API_SITE') . '/forums/17/topics', [
            'title' => 'Topic',
            'body' => 'Topic Body',
            'status' => 'Active',
            'type' => 'Post',
            'author_id' => Session::get('author_id'),
            'tags' => ['red','blue','green'],
        ]));

        array_push(
            $this->topics,
            array(
                'id' => $response->id,
                'forum_id' => $response->forum_id,
                'title' => $response->title,
                'slug' => $response->slug,
                'body' => $response->body,
                'url' => '',   //url
                'type' => $response->type,
                'status' => $response->status,
                'author_id' => $response->author_id,
                'tag_names' => $response->tag_names,
                'reports' => $response->reports,
                'score' => $response->score,
            )
        );
        $this->emit('$refresh');
    }

    public function destroyTopic($params)
    {
        $this->injectApi()->delete(getenv('API_SITE') . '/topics/' . $params['id']);
        dd($this->topics);
    }

    public function mount()
    {
        $this->topics = json_decode($this->injectApi()->get(getenv('API_SITE') . '/forums/forum/topics'));
    }


    public function render()
    {
        //$this->topics = json_decode($this->injectApi()->get(getenv('API_SITE') . '/forums/forum/topics'));
        return view('livewire.topics');
    }
}
