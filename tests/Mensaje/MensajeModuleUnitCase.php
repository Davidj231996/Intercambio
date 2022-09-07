<?php

declare(strict_types=1);

namespace App\Tests\Mensaje;

use App\Mensaje\Domain\Mensaje;
use App\Mensaje\Domain\MensajeRepository;
use App\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class MensajeModuleUnitCase extends UnitTestCase
{
    private MensajeRepository|MockInterface|null $repository;

    protected function shouldSave(Mensaje $mensaje): void
    {
        $this->repository()->shouldReceive('save')
            ->with($this->similarTo($mensaje))
            ->once()->andReturnNull();
    }

    protected function repository(): MensajeRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(MensajeRepository::class);
    }
}