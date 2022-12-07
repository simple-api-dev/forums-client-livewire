<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\apiKeyInject;
use Illuminate\Support\Facades\Session;

class Topics extends Component
{
    use apiKeyInject;

    public $topics;


    public function addTopic()
    {
        $response = json_decode($this->injectApi()->post(getenv('API_SITE') . '/forums/17/topics', [
            'title' => 'title',
            'body' => 'body',
            'status' => 'Active',
            'type' => 'Post',
            'author_id' => Session::get('author_id'),
            'tags' => [],
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
    }


    public function mount()
    {
        $this->topics = json_decode($this->injectApi()->get(getenv('API_SITE') . '/forums/forum/topics'));
    }


    public function render()
    {
        return view('livewire.topics');
    }
}
