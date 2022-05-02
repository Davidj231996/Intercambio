<?php

namespace App\Tests\Objeto;

use App\Objeto\Domain\ObjetoRepository;
use App\Tests\intercambio\Shared\Infrastructure\PhpUnit\IntercambioContextInfrastructureTestCase;

class ObjetoModuleInfraestructureTestCase extends IntercambioContextInfrastructureTestCase
{
    protected function repository(): ObjetoRepository
    {
        return $this->service(ObjetoRepository::class);
    }
}