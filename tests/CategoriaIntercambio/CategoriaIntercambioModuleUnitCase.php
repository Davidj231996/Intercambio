<?php

namespace App\Tests\CategoriaIntercambio;

use App\CategoriaIntercambio\Domain\CategoriaIntercambio;
use App\CategoriaIntercambio\Domain\CategoriaIntercambioRepository;
use App\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class CategoriaIntercambioModuleUnitCase extends UnitTestCase
{
    private CategoriaIntercambioRepository|MockInterface|null $repository;

    protected function shouldSave(CategoriaIntercambio $categoriaIntercambio): void
    {
        $this->repository()->shouldReceive('save')
            ->with($this->similarTo($categoriaIntercambio))
            ->once()
            ->andReturnNull();
    }

    protected function shouldDelete(CategoriaIntercambio $categoriaIntercambio): void
    {
        $this->repository()->shouldReceive('delete')
            ->with($this->similarTo($categoriaIntercambio))
            ->once()->andReturnNull();
    }

    protected function repository(): CategoriaIntercambioRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(CategoriaIntercambioRepository::class);
    }
}