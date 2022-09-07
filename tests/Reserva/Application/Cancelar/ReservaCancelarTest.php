<?php

namespace App\Tests\Reserva\Application\Cancelar;

use App\Reserva\Domain\Reserva;
use App\Tests\Reserva\Domain\ReservaMother;
use App\Tests\Reserva\ReservaModuleUnitCase;

class ReservaCancelarTest extends ReservaModuleUnitCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function debe_cancelar_reserva()
    {
        $reserva = ReservaMother::create(estado: Reserva::ESTADO_PENDIENTE);
        $reserva->cancelar();

        $this->shouldSave($reserva);

        $this->repository()->save($reserva);
    }
}