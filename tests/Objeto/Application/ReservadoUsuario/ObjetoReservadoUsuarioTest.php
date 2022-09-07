<?php

namespace App\Tests\Objeto\Application\ReservadoUsuario;

use App\Objeto\Application\ReservadoUsuario\ObjetoReservadoUsuario;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Objeto\ObjetoModuleUnitCase;
use App\Tests\Reserva\Domain\ReservaMother;
use App\Tests\Usuario\Domain\UsuarioMother;

class ObjetoReservadoUsuarioTest extends ObjetoModuleUnitCase
{
    private ObjetoReservadoUsuario $objetoReservadoUsuario;

    protected function setUp(): void
    {
        parent::setUp();

        $this->objetoReservadoUsuario = new ObjetoReservadoUsuario();
    }

    /** @test */
    public function devuelve_no_reservado_usuario()
    {
        $usuarioReserva = UsuarioMother::create();
        $objeto = ObjetoMother::new();

        $this->shouldSave($objeto);

        $this->repository()->save($objeto);

        self::assertFalse($this->objetoReservadoUsuario->estaReservado($objeto, $usuarioReserva));
    }
}