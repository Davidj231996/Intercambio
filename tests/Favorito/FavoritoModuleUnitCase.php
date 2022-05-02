<?php

declare(strict_types=1);

namespace App\Tests\Favorito;

use App\Favorito\Domain\Favorito;
use App\Favorito\Domain\FavoritoRepository;
use App\Favorito\Domain\Favoritos;
use App\Shared\Domain\Criteria\Criteria;
use App\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class FavoritoModuleUnitCase extends UnitTestCase
{
    private FavoritoRepository|MockInterface|null $repository;

    protected function shouldSave(Favorito $favorito): void
    {
        $this->repository()->shouldReceive('save')
            ->with($this->similarTo($favorito))
            ->once()->andReturnNull();
    }

    protected function shouldSearch(int $id, ?Favorito $favorito): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($id))
            ->once()
            ->andReturn($favorito);
    }

    protected function shouldSearchByCriteria(Criteria $criteria, Favoritos $favoritos): void
    {
        $this->repository()->shouldReceive('searchByCriteria')
            ->with($this->similarTo($criteria))
            ->once()->andReturn($favoritos);
    }

    protected function shouldDelete(Favorito $favorito): void
    {
        $this->repository()->shouldReceive('delete')
            ->with($this->similarTo($favorito))
            ->once()->andReturnNull();
    }

    protected function repository(): FavoritoRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(FavoritoRepository::class);
    }
}