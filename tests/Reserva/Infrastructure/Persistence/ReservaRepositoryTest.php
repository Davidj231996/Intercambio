<?php

namespace App\Tests\Reserva\Infrastructure\Persistence;

use App\Reserva\Domain\Reservas;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Reserva\Domain\ReservaMother;
use App\Tests\Reserva\ReservaModuleInfraestructureTestCase;
use App\Tests\Shared\Domain\IdMother;
use App\Tests\Usuario\Domain\UsuarioMother;

class ReservaRepositoryTest extends ReservaModuleInfraestructureTestCase
{

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function crea_reserva()
    {
        $reserva = ReservaMother::new();

        $this->repository()->save($reserva);
    }

    /**
     * @test
     */
    public function borra_reserva()
    {
        $reserva = ReservaMother::new();

        $this->repository()->save($reserva);

        $id = $reserva->id();

        $this->repository()->delete($reserva);

        $this->assertNull($this->repository()->search($id));
    }

    /** @test */
    public function devuelve_reserva_existente()
    {
        $valoracion = ReservaMother::new();

        $this->repository()->save($valoracion);

        $this->assertEquals($this->repository()->search($valoracion->id()), $valoracion);
    }

    /** @test */
    public function devuelve_una_reserva_que_no_existe(): void
    {
        $this->assertNull($this->repository()->search(IdMother::create()));
    }

    /** @test */
    public function devuelve_reservas_usuario_existente()
    {
        $usuario = UsuarioMother::create();
        $reserva = ReservaMother::new(usuario: $usuario);
        $reservas = new Reservas([$reserva]);

        $this->repository()->save($reserva);

        $this->assertEquals($this->repository()->searchByUsuario($usuario->id()), $reservas);
    }

    /** @test */
    public function devuelve_reservas_objeto_existente()
    {
        $objeto = ObjetoMother::create();
        $reserva = ReservaMother::new(objeto: $objeto);
        $reservas = new Reservas([$reserva]);

        $this->repository()->save($reserva);

        $this->assertEquals($this->repository()->searchByObjeto($objeto->id()), $reservas);
    }
}