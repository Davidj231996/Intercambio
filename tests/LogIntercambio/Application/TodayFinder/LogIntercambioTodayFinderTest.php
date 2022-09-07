<?php

namespace App\Tests\LogIntercambio\Application\TodayFinder;

use App\LogIntercambio\Application\TodayFinder\LogIntercambioTodayFinder;
use App\LogIntercambio\Domain\LogIntercambio;
use App\Tests\LogIntercambio\Domain\LogIntercambioMother;
use App\Tests\LogIntercambio\LogIntercambioModuleUnitCase;
use DateTime;

class LogIntercambioTodayFinderTest extends LogIntercambioModuleUnitCase
{
    private LogIntercambioTodayFinder $finder;

    protected function setUp(): void
    {
        parent::setUp();

        $this->finder = new LogIntercambioTodayFinder($this->repository());
    }

    /** @test */
    public function devuelve_log_intercambios_hoy()
    {
        $log = LogIntercambioMother::create(fecha: new DateTime(), estado: LogIntercambio::TIPO_CREACION);
        $log2 = LogIntercambioMother::create(fecha: new DateTime(), estado: LogIntercambio::TIPO_FINALIZAR);

        $this->shouldSave($log);

        $this->repository()->save($log);

        $this->shouldSave($log2);

        $this->repository()->save($log2);

        $logsDevolucion = [
            [
                'tipo' => LogIntercambio::TIPO_CREACION,
                'cantidad' => 1
            ],
            [
                'tipo' => LogIntercambio::TIPO_ACEPTAR,
                'cantidad' => 0
            ],
            [
                'tipo' => LogIntercambio::TIPO_CANCELAR,
                'cantidad' => 0
            ], [
                'tipo' => LogIntercambio::TIPO_ENVIAR,
                'cantidad' => 0
            ], [
                'tipo' => LogIntercambio::TIPO_FINALIZAR,
                'cantidad' => 1
            ]
        ];

        $this->shouldSearchToday(new DateTime(), $logsDevolucion);

        $this->finder->__invoke();
    }
}