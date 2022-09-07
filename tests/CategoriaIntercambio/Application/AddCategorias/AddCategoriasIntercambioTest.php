<?php

namespace App\Tests\CategoriaIntercambio\Application\AddCategorias;

use App\CategoriaIntercambio\Application\AddCategorias\AddCategoriasObjetoIntercambio;
use App\Tests\CategoriaIntercambio\CategoriaIntercambioModuleUnitCase;
use App\Tests\CategoriaIntercambio\Domain\CategoriaIntercambioMother;
use Doctrine\Common\Collections\ArrayCollection;

class AddCategoriasIntercambioTest extends CategoriaIntercambioModuleUnitCase
{
    private AddCategoriasObjetoIntercambio $addCategoriasObjetoIntercambio;

    protected function setUp(): void
    {
        parent::setUp();

        $this->addCategoriasObjetoIntercambio = new AddCategoriasObjetoIntercambio($this->repository());
    }

    /** @test */
    public function debe_crear_categorias_intercambio()
    {
        $categoriaObjeto = CategoriaIntercambioMother::new();

        $this->shouldSave($categoriaObjeto);

        $this->addCategoriasObjetoIntercambio->addCategoriasObjetoIntercambio(new ArrayCollection([$categoriaObjeto->categoria()]), $categoriaObjeto->objeto());
    }
}