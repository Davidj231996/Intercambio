<?php

declare(strict_types=1);

namespace App\Tests\Contacto;

use App\Contacto\Domain\Contacto;
use App\Contacto\Domain\ContactoRepository;
use App\Contacto\Domain\Contactos;
use App\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class ContactoModuleUnitCase extends UnitTestCase
{
    private ContactoRepository|MockInterface|null $repository;

    protected function shouldSave(Contacto $contacto): void
    {
        $this->repository()->shouldReceive('save')
            ->with($this->similarTo($contacto))
            ->once()->andReturnNull();
    }

    protected function shouldSearch(int $id, ?Contacto $contacto): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($id))
            ->once()
            ->andReturn($contacto);
    }

    protected function shouldSearchContestados(?Contactos $contactos): void
    {
        $this->repository()->shouldReceive('searchContestados')
            ->once()->andReturn($contactos);
    }

    protected function shouldSearchNoContestados(?Contactos $contactos): void
    {
        $this->repository()->shouldReceive('searchNoContestados')
            ->once()->andReturn($contactos);
    }

    protected function repository(): ContactoRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(ContactoRepository::class);
    }
}