<?php

namespace App\Http\Livewire;

use App\TracerStudy;
use Livewire\Component;

class TracerStudySubmission extends Component
{
    public $successMessage = '';

    public $name = '';
    public $currently_working = true;
    public $occupation = '';

    public function render()
    {
        return view('livewire.tracer-study-submission');
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required',
            'currently_working' => 'required|bool',
            'occupation' => 'required_if:currently_working,true,1',
        ]);

        TracerStudy::create([
            'name' => $this->name,
            'currently_working' => $this->currently_working,
            'occupation' => $this->occupation
        ]);

        $this->resetProperties();
        $this->successMessage = __('Thank you for your submission');
    }

    private function resetProperties()
    {
        $this->name = '';
        $this->currently_working = true;
        $this->occupation = '';
    }
}
