<?php

declare(strict_types=1);

namespace App\Tests\LogReserva;

use App\LogReserva\Domain\LogReserva;
use App\LogReserva\Domain\LogReservaRepository;
use App\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use DateTime;
use Mockery\MockInterface;

abstract class LogReservaModuleUnitCase extends UnitTestCase
{
    private LogReservaRepository|MockInterface|null $repository;

    protected function shouldSave(LogReserva $logReserva): void
    {
        $this->repository()->shouldReceive('save')
            ->with($this->similarTo($logReserva))
            ->once()->andReturnNull();
    }

    protected function shouldSearchToday(DateTime $today, ?array $logReservas): void
    {
        $this->repository()
            ->shouldReceive('searchToday')
            ->with($this->similarTo($today))
            ->once()
            ->andReturn($logReservas);
    }

    protected function shouldSearchWeek(DateTime $today, ?array $logReservas): void
    {
        $this->repository()
            ->shouldReceive('searchWeek')
            ->with($this->similarTo($today))
            ->once()
            ->andReturn($logReservas);
    }

    protected function repository(): LogReservaRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(LogReservaRepository::class);
    }
}