<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Report extends Component
{

    public $report_id, $author_id, $status, $type, $created_at;

    public function mount($report)
    {
        $this->report_id = $report['id'];
        $this->author_id = $report['author_id'];
        $this->status = $report['status'];
        $this->type = $report['type'];
        $this->created_at = $report['created_at'];
    }
    
    
    public function render()
    {
        return view('livewire.report');
    }
}
