<?php

declare(strict_types=1);

namespace App\Tests\Imagen;

use App\Imagen\Domain\Imagen;
use App\Imagen\Domain\Imagenes;
use App\Imagen\Domain\ImagenRepository;
use App\Shared\Domain\Criteria\Criteria;
use App\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class ImagenModuleUnitCase extends UnitTestCase
{
    private ImagenRepository|MockInterface|null $repository;

    protected function shouldSave(Imagen $imagen): void
    {
        $this->repository()->shouldReceive('save')
            ->with($this->similarTo($imagen))
            ->once()->andReturnNull();
    }

    protected function shouldSearch(int $id, ?Imagen $imagen): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($id))
            ->once()
            ->andReturn($imagen);
    }

    protected function shouldSearchByCriteria(Criteria $criteria, Imagenes $imagenes): void
    {
        $this->repository()->shouldReceive('searchByCriteria')
            ->with($this->similarTo($criteria))
            ->once()->andReturn($imagenes);
    }

    protected function shouldDelete(Imagen $imagen): void
    {
        $this->repository()->shouldReceive('delete')
            ->with($this->similarTo($imagen))
            ->once()->andReturnNull();
    }

    protected function repository(): ImagenRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(ImagenRepository::class);
    }
}