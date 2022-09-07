<?php

namespace App\Tests\LogIntercambio\Infrastructure\Persistence;

use App\Tests\LogIntercambio\Domain\LogIntercambioMother;
use App\Tests\LogIntercambio\LogIntercambioModuleInfraestructureTestCase;
use DateTime;

class LogIntercambioRepositoryTest extends LogIntercambioModuleInfraestructureTestCase
{

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function crea_log_intercambio()
    {
        $log = LogIntercambioMother::new();

        $this->repository()->save($log);
    }

    /** @test */
    public function devuelve_log_intercambio_hoy()
    {
        $log = LogIntercambioMother::new();
        $logsDevolucion = [
            [
                'tipo' => $log->tipo(),
                'cantidad' => 1
            ]
        ];

        $this->repository()->save($log);

        self::assertEquals($this->repository()->searchToday($log->fecha()), $logsDevolucion);
    }

    /** @test */
    public function devuelve_log_intercambio_semana()
    {
        $today = (new DateTime())->setTime(0,0);
        $log = LogIntercambioMother::new(fecha: $today);
        $logs = [[
            'fecha' => $today,
            'tipo' =>$log->tipo(),
            'cantidad' => 1
        ]];

        $this->repository()->save($log);

        self::assertEquals($this->repository()->searchWeek($today), $logs);
    }
}