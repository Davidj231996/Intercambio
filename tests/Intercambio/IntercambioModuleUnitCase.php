<?php

declare(strict_types=1);

namespace App\Tests\Intercambio;

use App\Intercambio\Domain\Intercambio;
use App\Intercambio\Domain\IntercambioRepository;
use App\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class IntercambioModuleUnitCase extends UnitTestCase
{
    private IntercambioRepository|MockInterface|null $repository;

    protected function shouldSave(Intercambio $intercambio): void
    {
        $this->repository()->shouldReceive('save')
            ->with($this->similarTo($intercambio))
            ->once()->andReturnNull();
    }

    protected function shouldSearch(int $id, ?Intercambio $intercambio): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($id))
            ->once()
            ->andReturn($intercambio);
    }

    protected function shouldDelete(Intercambio $intercambio): void
    {
        $this->repository()->shouldReceive('delete')
            ->with($this->similarTo($intercambio))
            ->once()->andReturnNull();
    }

    protected function repository(): IntercambioRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(IntercambioRepository::class);
    }
}