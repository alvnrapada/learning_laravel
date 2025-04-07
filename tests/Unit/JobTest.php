<?php

namespace Tests\Unit;

use App\Models\Employer;
use App\Models\Job;
use Tests\TestCase;

class JobTest extends TestCase
{
    /**
     * Test that a job belongs to an employer.
     */
    public function test_job_belongs_to_employer(): void
    {
        $employer = Employer::factory()->create();
        $job = Job::factory()->create([
            'employer_id' => $employer->id
        ]);

        $this->assertTrue($job->employer->is($employer));
    }
}
