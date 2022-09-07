<?php

namespace App\Tests\Direccion;

use App\Direccion\Domain\DireccionRepository;
use App\Tests\src\Shared\Infrastructure\PhpUnit\IntercambioContextInfrastructureTestCase;

class DireccionModuleInfraestructureTestCase extends IntercambioContextInfrastructureTestCase
{
    protected function repository(): DireccionRepository
    {
        return $this->service(DireccionRepository::class);
    }
}