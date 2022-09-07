<?php

namespace App\Tests\Direccion\Infrastructure\Persistence;

use App\Tests\Direccion\DireccionModuleInfraestructureTestCase;
use App\Tests\Direccion\Domain\DireccionMother;
use App\Tests\Shared\Domain\IdMother;
use App\Tests\Usuario\Domain\UsuarioMother;

class DireccionRepositoryTest extends DireccionModuleInfraestructureTestCase
{

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function crea_direccion()
    {
        $direccion = DireccionMother::new();

        $this->repository()->save($direccion);
    }

    /** @test */
    public function devuelve_direccion_existente()
    {
        $direccion = DireccionMother::new();

        $this->repository()->save($direccion);

        self::assertEquals($this->repository()->search($direccion->id()), $direccion);
    }

    /** @test */
    public function no_devuelve_direccion()
    {
        self::assertNull($this->repository()->search(IdMother::create()));
    }

    /** @test */
    public function devuelve_direccion_usuario()
    {
        $usuario = UsuarioMother::create();
        $direccion = DireccionMother::new(usuario: $usuario);

        $this->repository()->save($direccion);

        self::assertEquals($this->repository()->searchByUsuario($usuario), $direccion);
    }
}