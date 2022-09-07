<?php

namespace App\Tests\CategoriaObjeto\Application\UpdateCategorias;

use App\CategoriaObjeto\Application\UpdateCategorias\UpdateCategoriasObjeto;
use App\Tests\CategoriaObjeto\CategoriaObjetoModuleUnitCase;
use App\Tests\CategoriaObjeto\Domain\CategoriaObjetoMother;
use App\Tests\Objeto\Domain\ObjetoMother;

class UpdateCategoriasTest extends CategoriaObjetoModuleUnitCase
{
    private UpdateCategoriasObjeto $updateCategoriasObjeto;

    protected function setUp(): void
    {
        parent::setUp();

        $this->updateCategoriasObjeto = new UpdateCategoriasObjeto($this->repository());
    }
}