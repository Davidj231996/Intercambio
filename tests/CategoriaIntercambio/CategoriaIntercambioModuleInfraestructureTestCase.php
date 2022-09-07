<?php

namespace App\Tests\CategoriaIntercambio;

use App\CategoriaIntercambio\Domain\CategoriaIntercambioRepository;
use App\Tests\src\Shared\Infrastructure\PhpUnit\IntercambioContextInfrastructureTestCase;

class CategoriaIntercambioModuleInfraestructureTestCase extends IntercambioContextInfrastructureTestCase
{
    protected function repository(): CategoriaIntercambioRepository
    {
        return $this->service(CategoriaIntercambioRepository::class);
    }
}