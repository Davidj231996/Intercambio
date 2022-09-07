<?php

namespace App\Tests\Reserva\Application\Create;

use App\Tests\Reserva\Domain\ReservaMother;
use App\Tests\Reserva\ReservaModuleUnitCase;

class ReservaCreateTest extends ReservaModuleUnitCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function debe_aceptar_reserva()
    {
        $reserva = ReservaMother::new();

        $this->shouldSave($reserva);

        $this->repository()->save($reserva);
    }
}