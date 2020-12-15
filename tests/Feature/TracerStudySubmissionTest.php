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
        $response = $this->get('/tracer-study-submission');
        $response->assertSeeLivewire('tracer-study-submission');
    }

    public function testSubmitTracerStudy()
    {
        Livewire::test(TracerStudySubmission::class)
            ->set('name', 'bob')
            ->set('currently_working', true)
            ->set('occupation', 'software developer')
            ->call('submit');

        $this->assertTrue(TracerStudy::whereName('bob')->exists());
    }

    public function testResetPropertiesAfterSubmit()
    {
        Livewire::test(TracerStudySubmission::class)
            ->set('name', 'bob')
            ->set('currently_working', true)
            ->set('occupation', 'software developer')
            ->call('submit')
            ->assertSet('name', '')
            ->assertSet('currently_working', true)
            ->assertSet('occupation', '');
    }

    public function testShowSuccessMessageAfterSubmit()
    {
        Livewire::test(TracerStudySubmission::class)
            ->set('name', 'bob')
            ->set('currently_working', true)
            ->set('occupation', 'software developer')
            ->call('submit')
            ->assertSet('successMessage', __('Thank you for your submission'));
    }

    public function testValidation()
    {
        Livewire::test(TracerStudySubmission::class)
            ->set('name', '')
            ->set('currently_working', null)
            ->set('occupation', '')
            ->call('submit')
            ->assertHasErrors([
                'name' => 'required',
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
