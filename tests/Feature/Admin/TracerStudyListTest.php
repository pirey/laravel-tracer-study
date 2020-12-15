<?php

namespace Tests\Feature\Admin;

use App\TracerStudy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class TracerStudyListTest extends TestCase
{
    use RefreshDatabase;

    public function testRoute()
    {
        $this->get('/admin/tracer-studies')->assertSeeLivewire('admin.tracer-study-list');
    }

    public function testViewData()
    {
        Livewire::test('admin.tracer-study-list')
            ->assertViewHas('tracer_studies');
    }

    public function testFilterByName()
    {
        factory(TracerStudy::class, 3)->create();
        factory(TracerStudy::class)->create([
            'name' => 'bob'
        ]);

        $test = Livewire::test('admin.tracer-study-list');
        $test->set('name', 'bob');
        $tracer_studies = $test->viewData('tracer_studies');

        $this->assertEquals($tracer_studies->count(), 1);
        $this->assertEquals($tracer_studies->first()->name, 'bob');
    }

    public function testFilterByGraduationYear()
    {
        factory(TracerStudy::class, 3)->create();
        factory(TracerStudy::class)->create([
            'graduation_year' => '2017'
        ]);

        $test = Livewire::test('admin.tracer-study-list');
        $test->set('graduation_year', '2017');
        $tracer_studies = $test->viewData('tracer_studies');

        $this->assertEquals($tracer_studies->count(), 1);
        $this->assertEquals($tracer_studies->first()->graduation_year, '2017');
    }

    public function testFilterByProgramStudy()
    {
        factory(TracerStudy::class, 3)->create();
        factory(TracerStudy::class)->create([
            'program_study' => 'computer science'
        ]);

        $test = Livewire::test('admin.tracer-study-list');
        $test->set('program_study', 'computer science');
        $tracer_studies = $test->viewData('tracer_studies');

        $this->assertEquals($tracer_studies->count(), 1);
        $this->assertEquals($tracer_studies->first()->program_study, 'computer science');
    }

    public function testPagination()
    {
        factory(TracerStudy::class, 20)->create();

        $test = Livewire::test('admin.tracer-study-list');
        $test->set('page', 2);
        $tracer_studies = $test->viewData('tracer_studies');

        // per page = 15
        // we get second page, so only returns 5 results
        $this->assertEquals($tracer_studies->count(), 5);
    }

    public function testResetPageWhenFiltering()
    {
        factory(TracerStudy::class, 20)->create();

        $test = Livewire::test('admin.tracer-study-list');

        $test->set('page', 2);
        $test->set('name', 'foo');
        $test->assertSet('page', 1);

        $test->set('page', 2);
        $test->set('graduation_year', 'foo');
        $test->assertSet('page', 1);

        $test->set('page', 2);
        $test->set('program_study', 'foo');
        $test->assertSet('page', 1);
    }
}
