<?php

namespace App\Tests\Reserva\Application\Delete;

use App\Tests\Reserva\Domain\ReservaMother;
use App\Tests\Reserva\ReservaModuleUnitCase;

class ReservaDeleteTest extends ReservaModuleUnitCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function debe_eliminar_reserva()
    {
        $reserva = ReservaMother::new();

        $this->shouldSave($reserva);

        $this->repository()->save($reserva);

        $this->shouldDelete($reserva);

        $this->repository()->delete($reserva);
    }
}