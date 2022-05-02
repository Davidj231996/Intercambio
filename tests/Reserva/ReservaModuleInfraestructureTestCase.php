<?php

namespace App\Tests\Reserva;

use App\Reserva\Domain\ReservaRepository;
use App\Tests\intercambio\Shared\Infrastructure\PhpUnit\IntercambioContextInfrastructureTestCase;

class ReservaModuleInfraestructureTestCase extends IntercambioContextInfrastructureTestCase
{
    protected function repository(): ReservaRepository
    {
        return $this->service(ReservaRepository::class);
    }
}