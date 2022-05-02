<?php

namespace App\Tests\Categoria;

use App\Categoria\Domain\CategoriaRepository;
use App\Tests\intercambio\Shared\Infrastructure\PhpUnit\IntercambioContextInfrastructureTestCase;

class CategoriaModuleInfraestructureTestCase extends IntercambioContextInfrastructureTestCase
{
    protected function repository(): CategoriaRepository
    {
        return $this->service(CategoriaRepository::class);
    }
}