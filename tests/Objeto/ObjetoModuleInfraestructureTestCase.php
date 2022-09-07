<?php

namespace App\Tests\Objeto;

use App\Objeto\Domain\ObjetoRepository;
use App\Tests\src\Shared\Infrastructure\PhpUnit\IntercambioContextInfrastructureTestCase;

class ObjetoModuleInfraestructureTestCase extends IntercambioContextInfrastructureTestCase
{
    protected function repository(): ObjetoRepository
    {
        return $this->service(ObjetoRepository::class);
    }
}