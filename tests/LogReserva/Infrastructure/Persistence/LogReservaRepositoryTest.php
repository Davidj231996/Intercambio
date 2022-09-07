<?php

namespace App\Tests\LogReserva\Infrastructure\Persistence;

use App\LogReserva\Domain\LogReserva;
use App\Tests\LogReserva\Domain\LogReservaMother;
use App\Tests\LogReserva\LogReservaModuleInfraestructureTestCase;
use DateTime;

class LogReservaRepositoryTest extends LogReservaModuleInfraestructureTestCase
{

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function crea_log_reserva()
    {
        $log = LogReservaMother::new();

        $this->repository()->save($log);
    }

    /** @test */
    public function devuelve_log_reserva_hoy()
    {
        $today = new DateTime();
        $log = LogReservaMother::new(tipo: LogReserva::TIPO_CREAR, fecha: $today);
        $log2 = LogReservaMother::new(tipo: LogReserva::TIPO_ELIMINAR, fecha: $today);

        $this->repository()->save($log);
        $this->repository()->save($log2);

        $logsDevolucion = [
            [
                'tipo' => LogReserva::TIPO_ELIMINAR,
                'cantidad' => 1
            ],
            [
                'tipo' => LogReserva::TIPO_CREAR,
                'cantidad' => 1
            ]
        ];

        self::assertEquals($this->repository()->searchToday($log->fecha()), $logsDevolucion);
    }

    /** @test */
    public function devuelve_log_reserva_semana()
    {
        $today = (new DateTime())->setTime(0,0);
        $log = LogReservaMother::new(fecha: $today);
        $logs = [[
            'fecha' => $today,
            'tipo' =>$log->tipo(),
            'cantidad' => 1
        ]];

        $this->repository()->save($log);

        self::assertEquals($this->repository()->searchWeek($today), $logs);
    }
}