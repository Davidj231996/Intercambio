<?php

namespace App\Tests\LogReserva;

use App\LogObjeto\Domain\LogObjetoRepository;
use App\LogReserva\Domain\LogReservaRepository;
use App\Tests\src\Shared\Infrastructure\PhpUnit\IntercambioContextInfrastructureTestCase;

class LogReservaModuleInfraestructureTestCase extends IntercambioContextInfrastructureTestCase
{
    protected function repository(): LogReservaRepository
    {
        return $this->service(LogReservaRepository::class);
    }
}