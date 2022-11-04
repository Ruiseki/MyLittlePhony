<?php

namespace App\Tests;

use App\Entity\Jobs;
use App\Entity\Business;
use PHPUnit\Framework\TestCase;

class MatchingUnitTest extends TestCase
{
    public function testTrue(): void
    {
        $job = new Jobs();
        $bus = new Business();
        $bus->setName("SPACE-1222 Inc.");
        $bus->setPhone("03 65 13 12 22");

        $job->setName(('titre'))->setDescription("lorem description de l'offre")->setBusiness($bus);
        $this->assertTrue($job->getBusiness() === $bus);
        $this->assertTrue($job->getName() === 'titre');
        $this->assertTrue($job->getDescription() === "lorem description de l'offre");
    }
    public function testFalse(): void
    {
        $job = new Jobs();
        $bus = new Business();
        $bus->setName("SPACE-1222 Inc.");
        $bus->setPhone("03 65 13 12 22");

        $job->setName(('titre'))->setDescription("lorem description de l'offre")->setBusiness($bus);
        $this->assertFalse($job->getBusiness() === 'false');
        $this->assertFalse($job->getBusiness() === 'false');
        $this->assertFalse($job->getName() === 'false');
        $this->assertFalse($job->getDescription() === 'false');
    }
}