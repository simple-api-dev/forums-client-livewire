<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Traits\apiKeyInject;
use Illuminate\Support\Facades\Session;


class EditPost extends Component
{

    use apiKeyInject;

    public $topic_id = '';
    public $form = [
        'body' => '',
        'status' => '',
    ];



    public function submit()
    {
        $this->validate([
            'form.body' => ['required'],
            'form.status' => ['required'],
        ]);

        $response = json_decode($this->injectApi()->put(getenv('API_SITE') . '/topics/' . $this->topic_id, [
            'body' => $this->form['body'],
            'status' => $this->form['status'],
            'tags' => [],
        ]));

        if (isset($response->message)) {
            session()->flash('message', $response->message);
        } else {
            session()->flash('message', 'Topic updated');
            return redirect()->to('/');
        }
    }


    public function mount($topic_id, $topic_slug)
    {
        $this->topic_id = $topic_id;
        $response = $this->injectApi()->get(getenv('API_SITE') . '/topics/' . $topic_slug);
        $this->form['body'] = $response['body'];
        $this->form['status'] = $response['status'];
    }


    public function render()
    {
        return view('livewire.edit-post');
    }
}
