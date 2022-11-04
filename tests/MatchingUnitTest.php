<?php

namespace App\Tests;

use App\Entity\Jobs;
use PHPUnit\Framework\TestCase;

class MatchingUnitTest extends TestCase
{
    public function testSomething(): void
    {
        $job = new Jobs();

        $job->setName(('titre'));
        $this->assertTrue(true);
    }
}