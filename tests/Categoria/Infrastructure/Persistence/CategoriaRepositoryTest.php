<?php

namespace App\Tests\Categoria\Infrastructure\Persistence;

use App\Categoria\Domain\Categorias;
use App\Tests\Categoria\CategoriaModuleInfraestructureTestCase;
use App\Tests\Categoria\Domain\CategoriaMother;
use App\Tests\Shared\Domain\IdMother;

class CategoriaRepositoryTest extends CategoriaModuleInfraestructureTestCase
{

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function crea_categoria()
    {
        $categoria = CategoriaMother::new();

        $this->repository()->save($categoria);
    }

    /** @test */
    public function borra_categoria()
    {
        $categoria = CategoriaMother::new();

        $this->repository()->save($categoria);

        $id = $categoria->id();

        $this->repository()->delete($categoria);

        self::assertNull($this->repository()->search($id));
    }

    /** @test */
    public function devuelve_categoria_existente()
    {
        $categoria = CategoriaMother::create();

        $this->repository()->save($categoria);

        $this->assertEquals($this->repository()->search($categoria->id()), $categoria);
    }

    /** @test */
    public function no_devuelve_categoria(): void
    {
        $this->assertNull($this->repository()->search(IdMother::create()));
    }

    /** @test */
    public function devuelve_todas_las_categorias()
    {
        $categoria1 = CategoriaMother::new();
        $categoria2 = CategoriaMother::new();
        $categorias = new Categorias([$categoria1, $categoria2]);

        $this->repository()->save($categoria1);
        $this->repository()->save($categoria2);

        self::assertEquals($this->repository()->searchAll(), $categorias);
    }
}