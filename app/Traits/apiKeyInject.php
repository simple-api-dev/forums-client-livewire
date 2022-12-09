<?php

namespace App\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

trait apiKeyInject
{
    protected $apirequest = '';

    public function injectApi()
    {
        if (Session::has('token')) {
            $this->apirequest = Http::withHeaders([
                'Authorization' => 'Bearer ' . Session::get('token'),
                'APIKEY' => getenv('API_KEY')
            ]);
        } else {
            $this->apirequest = Http::withHeaders([
                'APIKEY' => getenv('API_KEY')
            ]);
        }
        $this->apirequest->timeout(3);

        return $this->apirequest;
    }
}
