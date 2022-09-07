<?php

namespace App\Tests\CategoriaIntercambio\Infrastructure\Persistence;

use App\Tests\CategoriaIntercambio\CategoriaIntercambioModuleInfraestructureTestCase;
use App\Tests\CategoriaIntercambio\Domain\CategoriaIntercambioMother;

class CategoriaIntercambioRepositoryTest extends CategoriaIntercambioModuleInfraestructureTestCase
{

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function crea_categoria_intercambio()
    {
        $categoriaIntercambio = CategoriaIntercambioMother::new();

        $this->repository()->save($categoriaIntercambio);
    }

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function borra_categoria_intercambio()
    {
        $categoriaIntercambio = CategoriaIntercambioMother::new();

        $this->repository()->save($categoriaIntercambio);

        $this->repository()->delete($categoriaIntercambio);
    }
}