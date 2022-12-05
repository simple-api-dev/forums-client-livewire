<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowTopic extends Component
{

    public function upvoteTopic($id)
    {
        $response = $this->injectApi()->post(getenv('API_SITE') . '/votes/up/topic/' . $id ,[
             'author_id' =>  Session::get('author_id'),
        ]);
    }

    
    public function render()
    {
        return view('livewire.show-topic');
    }
}
