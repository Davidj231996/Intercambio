<?php

declare(strict_types=1);

namespace App\Tests\Preferencia;

use App\Preferencia\Domain\Preferencia;
use App\Preferencia\Domain\PreferenciaRepository;
use App\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class PreferenciaModuleUnitCase extends UnitTestCase
{
    private PreferenciaRepository|MockInterface|null $repository;

    protected function shouldSave(Preferencia $preferencia): void
    {
        $this->repository()->shouldReceive('save')
            ->with($this->similarTo($preferencia))
            ->once()->andReturnNull();
    }

    protected function shouldSearch(int $id, ?Preferencia $preferencia): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($id))
            ->once()
            ->andReturn($preferencia);
    }

    protected function shouldDelete(Preferencia $preferencia): void
    {
        $this->repository()->shouldReceive('delete')
            ->with($this->similarTo($preferencia))
            ->once()->andReturnNull();
    }

    protected function repository(): PreferenciaRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(PreferenciaRepository::class);
    }
}