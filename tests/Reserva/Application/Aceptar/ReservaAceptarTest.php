<?php

namespace App\Tests\Reserva\Application\Aceptar;

use App\Reserva\Domain\Reserva;
use App\Tests\Reserva\Domain\ReservaMother;
use App\Tests\Reserva\ReservaModuleUnitCase;
use DateTime;

class ReservaAceptarTest extends ReservaModuleUnitCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function debe_aceptar_reserva()
    {
        $reserva = ReservaMother::create(estado: Reserva::ESTADO_PENDIENTE);
        $now = new DateTime();
        $reserva->update(Reserva::ESTADO_ACEPTADO, $now);

        $this->shouldSave($reserva);

        $this->repository()->save($reserva);
    }
}