<?php

declare(strict_types=1);

namespace App\Tests\Reserva;

use App\Reserva\Domain\Reserva;
use App\Reserva\Domain\ReservaRepository;
use App\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class ReservaModuleUnitCase extends UnitTestCase
{
    private ReservaRepository|MockInterface|null $repository;

    protected function shouldSave(Reserva $reserva): void
    {
        $this->repository()->shouldReceive('save')
            ->with($this->similarTo($reserva))
            ->once()->andReturnNull();
    }

    protected function shouldSearch(int $id, ?Reserva $reserva): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($id))
            ->once()
            ->andReturn($reserva);
    }

    protected function shouldDelete(Reserva $reserva): void
    {
        $this->repository()->shouldReceive('delete')
            ->with($this->similarTo($reserva))
            ->once()->andReturnNull();
    }

    protected function repository(): ReservaRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(ReservaRepository::class);
    }
}