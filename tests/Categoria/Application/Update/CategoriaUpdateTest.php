<?php

namespace App\Tests\Categoria\Application\Update;

use App\Categoria\Application\Update\CategoriaUpdate;
use App\Tests\Categoria\CategoriaModuleUnitCase;
use App\Tests\Categoria\Domain\CategoriaMother;

class CategoriaUpdateTest extends CategoriaModuleUnitCase
{
    private CategoriaUpdate $update;

    protected function setUp(): void
    {
        parent::setUp();

        $this->update = new CategoriaUpdate($this->repository());
    }

    /** @test */
    public function debe_actualizar_categoria()
    {
        $categoria = CategoriaMother::create();

        $this->shouldSave($categoria);

        $this->update->update($categoria, "Nuevo Nombre", $categoria->descripcion(), $categoria->categoria());
    }
}