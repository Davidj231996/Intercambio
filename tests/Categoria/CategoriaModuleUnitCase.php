<?php

declare(strict_types=1);

namespace App\Tests\Categoria;

use App\Categoria\Domain\Categoria;
use App\Categoria\Domain\CategoriaRepository;
use App\Categoria\Domain\Categorias;
use App\Shared\Domain\Criteria\Criteria;
use App\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class CategoriaModuleUnitCase extends UnitTestCase
{
    private CategoriaRepository|MockInterface|null $repository;

    protected function shouldSave(Categoria $categoria): void
    {
        $this->repository()->shouldReceive('save')
            ->with($this->similarTo($categoria))
            ->once()->andReturnNull();
    }

    protected function shouldDelete(Categoria $categoria): void
    {
        $this->repository()->shouldReceive('delete')
            ->with($this->similarTo($categoria))
            ->once()->andReturnNull();
    }

    protected function shouldSearchAll(?Categorias $categorias): void
    {
        $this->repository()->shouldReceive('searchAll')
            ->with()
            ->once()->andReturn($categorias);
    }

    protected function shouldSearch(int $id, ?Categoria $categoria): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($id))
            ->once()
            ->andReturn($categoria);
    }

    protected function shouldSearchByCriteria(Criteria $criteria, ?Categorias $categorias): void
    {
        $this->repository()->shouldReceive('searchByCriteria')
            ->with($this->similarTo($criteria))
            ->once()->andReturn($categorias);
    }

    protected function repository(): CategoriaRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(CategoriaRepository::class);
    }
}