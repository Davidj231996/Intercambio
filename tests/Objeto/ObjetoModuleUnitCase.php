<?php

declare(strict_types=1);

namespace App\Tests\Objeto;

use App\Objeto\Domain\Objeto;
use App\Objeto\Domain\ObjetoRepository;
use App\Objeto\Domain\Objetos;
use App\Shared\Domain\Criteria\Criteria;
use App\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
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

    protected function shouldSearchByCriteria(Criteria $criteria, Objetos $objetos): void
    {
        $this->repository()->shouldReceive('searchByCriteria')
            ->with($this->similarTo($criteria))
            ->once()->andReturn($objetos);
    }

    protected function shouldDelete(Objeto $objeto): void
    {
        $this->repository()->shouldReceive('delete')
            ->with($this->similarTo($objeto))
            ->once()->andReturnNull();
    }

    protected function repository(): ObjetoRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(ObjetoRepository::class);
    }
}