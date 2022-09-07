<?php

declare(strict_types=1);

namespace App\Tests\Direccion;

use App\Direccion\Domain\Direccion;
use App\Direccion\Domain\DireccionRepository;
use App\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use App\Usuario\Domain\Usuario;
use Mockery\MockInterface;

abstract class DireccionModuleUnitCase extends UnitTestCase
{
    private DireccionRepository|MockInterface|null $repository;

    protected function shouldSave(Direccion $direccion): void
    {
        $this->repository()->shouldReceive('save')
            ->with($this->similarTo($direccion))
            ->once()->andReturnNull();
    }

    protected function shouldSearch(int $id, ?Direccion $direccion): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($id))
            ->once()
            ->andReturn($direccion);
    }

    protected function shouldSearchByUsuario(Usuario $usuario, ?Direccion $direccion): void
    {
        $this->repository()
            ->shouldReceive('searchByUsuario')
            ->with($this->similarTo($usuario))
            ->once()
            ->andReturn($direccion);
    }

    protected function repository(): DireccionRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(DireccionRepository::class);
    }
}