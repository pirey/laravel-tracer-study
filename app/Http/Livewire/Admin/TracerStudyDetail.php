<?php

namespace App\Http\Livewire\Admin;

use App\TracerStudy;
use Livewire\Component;

class TracerStudyDetail extends Component
{
    public $tracer_study;

    public function mount(TracerStudy $tracer_study)
    {
        $this->tracer_study = $tracer_study;
    }

    public function render()
    {
        return view('livewire.admin.tracer-study-detail');
    }
}
