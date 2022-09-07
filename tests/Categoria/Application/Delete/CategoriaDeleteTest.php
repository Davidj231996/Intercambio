<?php

namespace App\Tests\Categoria\Application\Delete;

use App\Categoria\Application\Delete\CategoriaDelete;
use App\Tests\Categoria\CategoriaModuleUnitCase;
use App\Tests\Categoria\Domain\CategoriaMother;

class CategoriaDeleteTest extends CategoriaModuleUnitCase
{
    private CategoriaDelete $delete;

    protected function setUp(): void
    {
        parent::setUp();

        $this->delete = new CategoriaDelete($this->repository());
    }

    /** @test */
    public function debe_borrar_categoria()
    {
        $categoria = CategoriaMother::create();

        $this->shouldSave($categoria);

        $this->repository()->save($categoria);

        $this->shouldSearch($categoria->id(), $categoria);

        $this->shouldDelete($categoria);

        $this->delete->delete($categoria->id());
    }
}