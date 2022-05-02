<?php

declare(strict_types=1);

namespace App\Tests\Valoracion;

use App\Shared\Domain\Criteria\Criteria;
use App\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use App\Usuario\Domain\Usuario;
use App\Usuario\Domain\UsuarioRepository;
use App\Usuario\Domain\Usuarios;
use App\Valoracion\Domain\Valoracion;
use App\Valoracion\Domain\ValoracionRepository;
use Mockery\MockInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

abstract class ValoracionModuleUnitCase extends UnitTestCase
{
    private ValoracionRepository|MockInterface|null $repository;

    protected function shouldSave(Valoracion $valoracion): void
    {
        $this->repository()->shouldReceive('save')
            ->with($this->similarTo($valoracion))
            ->once()->andReturnNull();
    }

    protected function shouldSearch(int $id, ?Valoracion $valoracion): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($id))
            ->once()
            ->andReturn($valoracion);
    }

    protected function repository(): ValoracionRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(ValoracionRepository::class);
    }
}