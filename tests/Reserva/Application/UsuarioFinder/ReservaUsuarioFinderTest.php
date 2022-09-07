<?php

namespace App\Tests\Reserva\Application\UsuarioFinder;

use App\Reserva\Application\ObjetoFinder\ReservaObjetoFinder;
use App\Reserva\Application\UsuarioFinder\ReservaUsuarioFinder;
use App\Reserva\Domain\Reservas;
use App\Tests\Reserva\Domain\ReservaMother;
use App\Tests\Reserva\ReservaModuleUnitCase;

class ReservaUsuarioFinderTest extends ReservaModuleUnitCase
{
    private ReservaUsuarioFinder $finder;

    public function setUp(): void
    {
        parent::setUp();

        $this->finder = new ReservaUsuarioFinder($this->repository());
    }

    /** @test */
    public function devuelve_reserva_usuario()
    {
        $reserva = ReservaMother::new();
        $reservas = new Reservas([$reserva]);

        $this->shouldSearchByUsuario($reserva->usuario()->id(), $reservas);

        $this->finder->__invoke($reserva->usuario()->id());
    }
}