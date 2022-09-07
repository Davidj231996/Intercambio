<?php

namespace App\Tests\LogObjeto\Infrastructure\Persistence;

use App\Tests\LogObjeto\Domain\LogObjetoMother;
use App\Tests\LogObjeto\LogObjetoModuleInfraestructureTestCase;
use DateTime;

class LogObjetoRepositoryTest extends LogObjetoModuleInfraestructureTestCase
{

    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function crea_log_objeto()
    {
        $log = LogObjetoMother::new();

        $this->repository()->save($log);
    }

    /** @test */
    public function devuelve_log_objeto_hoy()
    {
        $log = LogObjetoMother::new();
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
    public function devuelve_log_objeto_semana()
    {
        $today = (new DateTime())->setTime(0,0);
        $log = LogObjetoMother::new(fecha: $today);
        $logs = [[
            'fecha' => $today,
            'tipo' =>$log->tipo(),
            'cantidad' => 1
        ]];

        $this->repository()->save($log);

        self::assertEquals($this->repository()->searchWeek($today), $logs);
    }
}