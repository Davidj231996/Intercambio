<?php

namespace App\Tests\LogReserva\Application\Create;

use App\Tests\LogReserva\Domain\LogReservaMother;
use App\Tests\LogReserva\LogReservaModuleUnitCase;

class LogReservaCreateTest extends LogReservaModuleUnitCase
{
    /** @test */
    public function debe_crear_log_reserva()
    {
        $logReserva = LogReservaMother::new();

        $this->shouldSave($logReserva);

        $this->repository()->save($logReserva);
    }
}