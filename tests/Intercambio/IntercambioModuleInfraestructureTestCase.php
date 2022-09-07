<?php

namespace App\Tests\Intercambio;

use App\Intercambio\Domain\IntercambioRepository;
use App\Tests\src\Shared\Infrastructure\PhpUnit\IntercambioContextInfrastructureTestCase;

class IntercambioModuleInfraestructureTestCase extends IntercambioContextInfrastructureTestCase
{
    protected function repository(): IntercambioRepository
    {
        return $this->service(IntercambioRepository::class);
    }
}