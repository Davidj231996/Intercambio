<?php

namespace App\Tests\Mensaje;

use App\Mensaje\Domain\MensajeRepository;
use App\Tests\src\Shared\Infrastructure\PhpUnit\IntercambioContextInfrastructureTestCase;

class MensajeModuleInfraestructureTestCase extends IntercambioContextInfrastructureTestCase
{
    protected function repository(): MensajeRepository
    {
        return $this->service(MensajeRepository::class);
    }
}