<?php

namespace Tests\Unit;

use App\TracerStudy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TracerStudyTest extends TestCase
{
    use RefreshDatabase;

    public function testAttributes()
    {
        $model = factory(TracerStudy::class)->create();

        $this->assertNotNull($model->name);
        $this->assertNotNull($model->currently_working);
        $this->assertNotNull($model->occupation);
    }
}
