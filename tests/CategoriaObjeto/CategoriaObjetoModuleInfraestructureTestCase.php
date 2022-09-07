<?php

namespace App\Tests\CategoriaObjeto;

use App\CategoriaObjeto\Domain\CategoriaObjetoRepository;
use App\Tests\src\Shared\Infrastructure\PhpUnit\IntercambioContextInfrastructureTestCase;

class CategoriaObjetoModuleInfraestructureTestCase extends IntercambioContextInfrastructureTestCase
{
    protected function repository(): CategoriaObjetoRepository
    {
        return $this->service(CategoriaObjetoRepository::class);
    }
}