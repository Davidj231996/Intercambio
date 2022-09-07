<?php

namespace App\Tests\Valoracion\Infrastructure\Persistence;

use App\Tests\Shared\Domain\IdMother;
use App\Tests\Usuario\Domain\UsuarioMother;
use App\Tests\Valoracion\Domain\ValoracionMother;
use App\Tests\Valoracion\ValoracionModuleInfraestructureTestCase;

class ValoracionRepositoryTest extends ValoracionModuleInfraestructureTestCase
{

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function crea_valoracion()
    {
        $valoracion = ValoracionMother::new();

        $this->repository()->save($valoracion);
    }

    /** @test */
    public function devuelve_valoracion_usuario_existente()
    {
        $usuario = UsuarioMother::create();
        $valoracion = ValoracionMother::new(usuario: $usuario);

        $this->repository()->save($valoracion);

        $this->assertEquals($this->repository()->search($usuario->id()), $valoracion);
    }

    /** @test */
    public function devuelve_una_valoracion_que_no_existe(): void
    {
        $this->assertNull($this->repository()->search(IdMother::create()));
    }
}