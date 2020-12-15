<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Maatwebsite\Excel\Facades\Excel;
use Tests\TestCase;

class TracerStudyExportTest extends TestCase
{
    use RefreshDatabase;

    public function testExportTracerStudy()
    {
        Excel::fake();

        $this->get('/admin/tracer-studies/download');

        Excel::assertDownloaded('tracer-studies.xlsx');
    }
}
