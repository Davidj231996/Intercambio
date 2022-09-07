<?php

namespace App\Tests\Reserva\Application\ObjetoFinder;

use App\Reserva\Application\ObjetoFinder\ReservaObjetoFinder;
use App\Reserva\Domain\Reservas;
use App\Tests\Reserva\Domain\ReservaMother;
use App\Tests\Reserva\ReservaModuleUnitCase;

class ReservaObjetoFinderTest extends ReservaModuleUnitCase
{
    private ReservaObjetoFinder $finder;

    public function setUp(): void
    {
        parent::setUp();

        $this->finder = new ReservaObjetoFinder($this->repository());
    }

    /** @test */
    public function devuelve_reserva_objeto()
    {
        $reserva = ReservaMother::new();
        $reservas = new Reservas([$reserva]);

        $this->shouldSearchByObjeto($reserva->objeto()->id(), $reservas);

        $this->finder->__invoke($reserva->objeto()->id());
    }
}