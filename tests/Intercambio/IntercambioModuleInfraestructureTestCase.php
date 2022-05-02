<?php

namespace App\Tests\Intercambio;

use App\Intercambio\Domain\IntercambioRepository;
use App\Tests\intercambio\Shared\Infrastructure\PhpUnit\IntercambioContextInfrastructureTestCase;

class IntercambioModuleInfraestructureTestCase extends IntercambioContextInfrastructureTestCase
{
    protected function repository(): IntercambioRepository
    {
        return $this->service(IntercambioRepository::class);
    }
}