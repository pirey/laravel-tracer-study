<?php

namespace Tests\Feature\Admin;

use App\TracerStudy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class TracerStudyDetailTest extends TestCase
{
    use RefreshDatabase;

    public function testRoute()
    {
        $tracer_study = factory(TracerStudy::class)->create();
        $this->get('/admin/tracer-studies/' . $tracer_study->id)->assertSeeLivewire('admin.tracer-study-detail');
    }

    public function testViewData()
    {
        $tracer_study = factory(TracerStudy::class)->create();
        Livewire::test('admin.tracer-study-detail', ['tracer_study' => $tracer_study])
            ->assertViewHas('tracer_study', $tracer_study);
    }
}
