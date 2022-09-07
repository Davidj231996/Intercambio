<?php

namespace App\Tests\src\Shared\Infrastructure\PhpUnit;

use App\Kernel;
use App\Tests\Shared\Infrastructure\PhpUnit\InfrastructureTestCase;
use Doctrine\ORM\EntityManagerInterface;

class IntercambioContextInfrastructureTestCase extends InfrastructureTestCase
{

    protected function setUp(): void
    {
        parent::setUp();

        $arranger = new IntercambioEnvironmentArranger($this->service(EntityManagerInterface::class));

        $arranger->arrange();
    }

    protected function tearDown(): void
    {
        $arranger = new IntercambioEnvironmentArranger($this->service(EntityManagerInterface::class));

        $arranger->close();

        parent::tearDown();
    }

    protected function kernelClass(): string
    {
        return Kernel::class;
    }
}