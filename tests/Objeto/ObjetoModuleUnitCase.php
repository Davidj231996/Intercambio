<?php

namespace App\Tests\Objeto;

use App\Objeto\Domain\Objeto;
use App\Objeto\Domain\ObjetoRepository;
use App\Tests\Shared\Infraestructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class ObjetoModuleUnitCase extends UnitTestCase
{
    private ObjetoRepository|MockInterface|null $repository;

    protected function shouldSave(Objeto $objeto): void
    {
        $this->repository()->shouldReceive('save')
            ->with($this->similarTo($objeto))
            ->once()->andReturnNull();
    }

    protected function shouldSearch(int $id, ?Objeto $objeto): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($id))
            ->once()
            ->andReturn($objeto);
    }

    protected function repository(): ObjetoRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(ObjetoRepository::class);
    }
}