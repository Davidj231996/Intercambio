<?php

namespace App\Tests\LogObjeto;

use App\LogObjeto\Domain\LogObjetoRepository;
use App\Tests\src\Shared\Infrastructure\PhpUnit\IntercambioContextInfrastructureTestCase;

class LogObjetoModuleInfraestructureTestCase extends IntercambioContextInfrastructureTestCase
{
    protected function repository(): LogObjetoRepository
    {
        return $this->service(LogObjetoRepository::class);
    }
}