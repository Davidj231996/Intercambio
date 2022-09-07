<?php

declare(strict_types=1);

namespace App\Tests\CategoriaObjeto;

use App\CategoriaObjeto\Domain\CategoriaObjeto;
use App\CategoriaObjeto\Domain\CategoriaObjetoRepository;
use App\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use App\Usuario\Domain\Usuario;
use Mockery\MockInterface;

abstract class CategoriaObjetoModuleUnitCase extends UnitTestCase
{
    private CategoriaObjetoRepository|MockInterface|null $repository;

    protected function shouldSave(CategoriaObjeto $categoriaObjeto): void
    {
        $this->repository()->shouldReceive('save')
            ->with($this->similarTo($categoriaObjeto))
            ->once()->andReturnNull();
    }

    protected function shouldDelete(CategoriaObjeto $categoriaObjeto): void
    {
        $this->repository()->shouldReceive('delete')
            ->with($this->similarTo($categoriaObjeto))
            ->once()->andReturnNull();
    }

    protected function repository(): CategoriaObjetoRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(CategoriaObjetoRepository::class);
    }
}