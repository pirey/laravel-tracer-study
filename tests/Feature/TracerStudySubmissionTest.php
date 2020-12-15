<?php

namespace Tests\Feature;

use App\TracerStudy;
use App\Http\Livewire\TracerStudySubmission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Livewire\Livewire;
use Tests\TestCase;

class TracerStudySubmissionTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function testRoute()
    {
        $this->get('/')->assertRedirect('/tracer-study-submission');

        $this->get('/tracer-study-submission')->assertSeeLivewire('tracer-study-submission');
    }

    public function testSubmitTracerStudy()
    {
        Livewire::test(TracerStudySubmission::class)
            ->set('name', 'bob')
            ->set('program_study', 'computer science')
            ->set('graduation_year', '2017')
            ->set('currently_working', true)
            ->set('occupation', 'software developer')
            ->call('submit');

        $this->assertTrue(TracerStudy::whereName('bob')->exists());
    }

    public function testResetPropertiesAfterSubmit()
    {
        Livewire::test(TracerStudySubmission::class)
            ->set('name', 'bob')
            ->set('program_study', 'computer science')
            ->set('graduation_year', '2017')
            ->set('currently_working', true)
            ->set('occupation', 'software developer')
            ->call('submit')
            ->assertSet('name', '')
            ->assertSet('program_study', '')
            ->assertSet('graduation_year', '')
            ->assertSet('currently_working', true)
            ->assertSet('occupation', '');
    }

    public function testShowSuccessMessageAfterSubmit()
    {
        Livewire::test(TracerStudySubmission::class)
            ->set('name', 'bob')
            ->set('program_study', 'computer science')
            ->set('graduation_year', '2017')
            ->set('currently_working', true)
            ->set('occupation', 'software developer')
            ->call('submit')
            ->assertSet('success_message', __('Thank you for your submission'));
    }

    public function testValidation()
    {
        Livewire::test(TracerStudySubmission::class)
            ->set('name', '')
            ->set('program_study', '')
            ->set('graduation_year', '')
            ->set('currently_working', null)
            ->set('occupation', '')
            ->call('submit')
            ->assertHasErrors([
                'name' => 'required',
                'program_study' => 'required',
                'graduation_year' => 'required',
                'currently_working' => 'required',
            ])
            ->set('currently_working', true)
            ->set('occupation', '')
            ->call('submit')
            ->assertHasErrors([
                'occupation' => 'required_if'
            ]);
    }
}
