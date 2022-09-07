<?php

namespace App\Tests\CategoriaObjeto\Infrastructure\Persistence;

use App\Tests\CategoriaObjeto\CategoriaObjetoModuleInfraestructureTestCase;
use App\Tests\CategoriaObjeto\Domain\CategoriaObjetoMother;

class CategoriaObjetoRepositoryTest extends CategoriaObjetoModuleInfraestructureTestCase
{

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function crea_categoria_objeto()
    {
        $categoriaObjeto = CategoriaObjetoMother::new();

        $this->repository()->save($categoriaObjeto);
    }

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function borra_categoria_objeto()
    {
        $categoriaObjeto = CategoriaObjetoMother::new();

        $this->repository()->save($categoriaObjeto);

        $this->repository()->delete($categoriaObjeto);
    }
}