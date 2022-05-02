<?php

namespace App\Tests\Usuario\Infrastructure\Persistence;

use App\Tests\Shared\Domain\IdMother;
use App\Tests\Usuario\Domain\UsuarioMother;
use App\Tests\Usuario\UsuarioModuleInfraestructureTestCase;
use App\Usuario\Domain\UsuarioRepository;
use App\Usuario\Infrastructure\Persistence\UsuarioRepositoryMySql;

class UsuarioRepositoryTest extends UsuarioModuleInfraestructureTestCase
{

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function crea_usuario()
    {
        $usuario = UsuarioMother::new();

        $this->repository()->save($usuario);
    }

    /** @test */
    public function devuelve_usuario_existente()
    {
        $usuario = UsuarioMother::create();

        $this->repository()->save($usuario);

        $this->assertEquals($this->repository()->search($usuario->id()), $usuario);
    }

    /** @test */
    public function devuelve_un_usuario_que_no_existe(): void
    {
        $this->assertNull($this->repository()->search(IdMother::create()));
    }
}