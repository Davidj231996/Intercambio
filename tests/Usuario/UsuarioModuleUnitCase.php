<?php

declare(strict_types=1);

namespace App\Tests\Usuario;

use App\Shared\Domain\Criteria\Criteria;
use App\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use App\Usuario\Domain\Usuario;
use App\Usuario\Domain\UsuarioRepository;
use App\Usuario\Domain\Usuarios;
use Mockery\MockInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

abstract class UsuarioModuleUnitCase extends UnitTestCase
{
    private UsuarioRepository|MockInterface|null $repository;
    private UserPasswordHasherInterface|MockInterface|null $hasher;

    protected function shouldSave(Usuario $usuario): void
    {
        $this->repository()->shouldReceive('save')
            ->with($this->similarTo($usuario))
            ->once()->andReturnNull();
    }

    protected function shouldSearch(int $id, ?Usuario $usuario): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with($this->similarTo($id))
            ->once()
            ->andReturn($usuario);
    }

    protected function shouldSearchByCriteria(Criteria $criteria, Usuarios $usuarios): void
    {
        $this->repository()->shouldReceive('searchByCriteria')
            ->with($this->similarTo($criteria))
            ->once()->andReturn($usuarios);
    }

    protected function shouldDelete(Usuario $usuario): void
    {
        $this->repository()->shouldReceive('delete')
            ->with($this->similarTo($usuario))
            ->once()->andReturnNull();
    }

    protected function hashPassword(Usuario $usuario, string $password) {
        $this->hasher->shouldReceive('hashPassword')
            ->with($this->similarTo($usuario), $this->similarTo($password))
            ->once()->andReturns();
    }

    protected function isPasswordValid(Usuario $usuario, string $password)
    {
        $this->hasher->shouldReceive('isPasswordValid')
            ->with($this->similarTo($usuario), $this->similarTo($password))
            ->once()->andReturn(true);
    }

    protected function isPasswordNotValid(Usuario $usuario, string $password)
    {
        $this->hasher->shouldReceive('isPasswordValid')
            ->with($this->similarTo($usuario), $this->similarTo($password))
            ->once()->andReturn(false);
    }

    protected function repository(): UsuarioRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(UsuarioRepository::class);
    }

    protected function hasher(): UserPasswordHasherInterface|MockInterface
    {
        return $this->hasher = $this->hasher ?? $this->mock(UserPasswordHasherInterface::class);
    }
}