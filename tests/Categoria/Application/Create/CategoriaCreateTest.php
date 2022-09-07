<?php

namespace App\Tests\Categoria\Application\Create;

use App\Categoria\Application\Create\CategoriaCreate;
use App\Tests\Categoria\CategoriaModuleUnitCase;
use App\Tests\Categoria\Domain\CategoriaMother;

class CategoriaCreateTest extends CategoriaModuleUnitCase
{
    private CategoriaCreate $create;

    protected function setUp(): void
    {
        parent::setUp();

        $this->create = new CategoriaCreate($this->repository());
    }

    /** @test */
    public function debe_crear_categoria()
    {
        $categoria = CategoriaMother::new();

        $this->shouldSave($categoria);

        $this->create->create($categoria->nombre(), $categoria->descripcion(), $categoria->categoria());
    }
}