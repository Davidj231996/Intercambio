<?php

namespace App\Tests\CategoriaObjeto\Application\AddCategorias;

use App\CategoriaObjeto\Application\AddCategorias\AddCategoriasObjeto;
use App\Tests\CategoriaObjeto\CategoriaObjetoModuleUnitCase;
use App\Tests\CategoriaObjeto\Domain\CategoriaObjetoMother;
use Doctrine\Common\Collections\ArrayCollection;

class AddCategoriasTest extends CategoriaObjetoModuleUnitCase
{
    private AddCategoriasObjeto $addCategoriasObjeto;

    protected function setUp(): void
    {
        parent::setUp();

        $this->addCategoriasObjeto = new AddCategoriasObjeto($this->repository());
    }

    /** @test */
    public function debe_crear_categorias_objeto()
    {
        $categoriaObjeto = CategoriaObjetoMother::new();

        $this->shouldSave($categoriaObjeto);

        $this->addCategoriasObjeto->addCategoriasObjeto(new ArrayCollection([$categoriaObjeto->categoria()]), $categoriaObjeto->objeto());
    }
}