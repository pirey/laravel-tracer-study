<?php

namespace App\Http\Livewire\Admin;

use App\TracerStudy;
use Livewire\Component;
use Livewire\WithPagination;

class TracerStudyList extends Component
{
    use WithPagination;

    public $name = '';
    public $program_study = '';
    public $graduation_year = '';

    public function updating($name, $value)
    {
        $filter_props = ['name', 'program_study', 'graduation_year'];
        if (in_array($name, $filter_props)) {
            // reset page when filtering
            $this->page = 1;
        }
    }

    public function render()
    {
        $tracer_studies = $this->getTracerStudies();

        $data = [
            'tracer_studies' => $tracer_studies
        ];

        return view('livewire.admin.tracer-study-list', $data);
    }

    private function getTracerStudies()
    {
        $query = TracerStudy::query();

        if ($this->name) {
            $query->whereName($this->name);
        }

        if ($this->program_study) {
            $query->whereProgramStudy($this->program_study);
        }

        if ($this->graduation_year) {
            $query->whereGraduationYear($this->graduation_year);
        }

        $tracer_studies = $query->paginate();

        return $tracer_studies;
    }
}
