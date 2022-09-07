<?php

namespace App\Tests\Categoria\Application\AllFinder;

use App\Categoria\Application\AllFinder\CategoriasAllFinder;
use App\Categoria\Domain\Categorias;
use App\Tests\Categoria\CategoriaModuleUnitCase;
use App\Tests\Categoria\Domain\CategoriaMother;

class AllFinderTest extends CategoriaModuleUnitCase
{
    private CategoriasAllFinder $finder;

    protected function setUp(): void
    {
        parent::setUp();

        $this->finder = new CategoriasAllFinder($this->repository());
    }

    /** @test */
    public function debe_devolver_todas_las_categorias()
    {
        $categoria = CategoriaMother::new();

        $this->shouldSave($categoria);

        $this->repository()->save($categoria);

        $this->shouldSearchAll(new Categorias([$categoria]));

        $this->finder->__invoke();
    }
}