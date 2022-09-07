<?php

declare(strict_types=1);

namespace App\Tests\LogIntercambio;

use App\LogIntercambio\Domain\LogIntercambio;
use App\LogIntercambio\Domain\LogIntercambioRepository;
use App\Shared\Domain\Criteria\Criteria;
use App\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use App\Usuario\Domain\Usuario;
use App\Usuario\Domain\UsuarioRepository;
use App\Usuario\Domain\Usuarios;
use DateTime;
use Mockery\MockInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

abstract class LogIntercambioModuleUnitCase extends UnitTestCase
{
    private LogIntercambioRepository|MockInterface|null $repository;

    protected function shouldSave(LogIntercambio $logIntercambio): void
    {
        $this->repository()->shouldReceive('save')
            ->with($this->similarTo($logIntercambio))
            ->once()->andReturnNull();
    }

    protected function shouldSearchToday(DateTime $today, ?array $logIntercambios): void
    {
        $this->repository()
            ->shouldReceive('searchToday')
            ->with($this->similarTo($today))
            ->once()
            ->andReturn($logIntercambios);
    }

    protected function shouldSearchWeek(DateTime $today, ?array $logIntercambios): void
    {
        $this->repository()
            ->shouldReceive('searchWeek')
            ->with($this->similarTo($today))
            ->once()
            ->andReturn($logIntercambios);
    }

    protected function repository(): LogIntercambioRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(LogIntercambioRepository::class);
    }
}