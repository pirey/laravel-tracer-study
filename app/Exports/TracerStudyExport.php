<?php

namespace App\Exports;

use App\TracerStudy;
use Maatwebsite\Excel\Concerns\FromCollection;

class TracerStudyExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return TracerStudy::all();
    }
}
