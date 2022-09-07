<?php

namespace App\Tests\LogIntercambio;

use App\LogIntercambio\Domain\LogIntercambioRepository;
use App\Tests\src\Shared\Infrastructure\PhpUnit\IntercambioContextInfrastructureTestCase;

class LogIntercambioModuleInfraestructureTestCase extends IntercambioContextInfrastructureTestCase
{
    protected function repository(): LogIntercambioRepository
    {
        return $this->service(LogIntercambioRepository::class);
    }
}