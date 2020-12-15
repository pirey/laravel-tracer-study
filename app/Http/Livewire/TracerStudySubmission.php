<?php

namespace App\Http\Livewire;

use App\TracerStudy;
use Livewire\Component;

class TracerStudySubmission extends Component
{
    public $success_message = '';

    public $name = '';
    public $program_study = '';
    public $graduation_year = '';
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
            'program_study' => 'required',
            'graduation_year' => 'required',
            'currently_working' => 'required|bool',
            'occupation' => 'required_if:currently_working,true,1',
        ]);

        TracerStudy::create([
            'name' => $this->name,
            'program_study' => $this->program_study,
            'graduation_year' => $this->graduation_year,
            'currently_working' => $this->currently_working,
            'occupation' => $this->occupation
        ]);

        $this->reset();
        $this->success_message = __('Thank you for your submission');
    }
}
