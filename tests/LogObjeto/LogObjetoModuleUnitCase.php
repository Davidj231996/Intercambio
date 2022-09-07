<?php

declare(strict_types=1);

namespace App\Tests\LogObjeto;

use App\LogObjeto\Domain\LogObjeto;
use App\LogObjeto\Domain\LogObjetoRepository;
use App\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use DateTime;
use Mockery\MockInterface;

abstract class LogObjetoModuleUnitCase extends UnitTestCase
{
    private LogObjetoRepository|MockInterface|null $repository;

    protected function shouldSave(LogObjeto $logObjeto): void
    {
        $this->repository()->shouldReceive('save')
            ->with($this->similarTo($logObjeto))
            ->once()->andReturnNull();
    }

    protected function shouldSearchToday(DateTime $today, ?array $logObjetos): void
    {
        $this->repository()
            ->shouldReceive('searchToday')
            ->with($this->similarTo($today))
            ->once()
            ->andReturn($logObjetos);
    }

    protected function shouldSearchWeek(DateTime $today, ?array $logObjetos): void
    {
        $this->repository()
            ->shouldReceive('searchWeek')
            ->with($this->similarTo($today))
            ->once()
            ->andReturn($logObjetos);
    }

    protected function repository(): LogObjetoRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(LogObjetoRepository::class);
    }
}