<?php

namespace App\Tests\LogReserva\Application\TodayFinder;

use App\LogReserva\Application\TodayFinder\LogReservaTodayFinder;
use App\LogReserva\Domain\LogReserva;
use App\Tests\LogReserva\Domain\LogReservaMother;
use App\Tests\LogReserva\LogReservaModuleUnitCase;
use DateTime;

class LogReservaTodayFinderTest extends LogReservaModuleUnitCase
{
    private LogReservaTodayFinder $finder;

    protected function setUp(): void
    {
        parent::setUp();

        $this->finder = new LogReservaTodayFinder($this->repository());
    }

    /** @test */
    public function devuelve_log_reservas_hoy()
    {
        $log = LogReservaMother::create(fecha: new DateTime(), estado: LogReserva::TIPO_CREAR);
        $log2 = LogReservaMother::create(fecha: new DateTime(), estado: LogReserva::TIPO_ELIMINAR);

        $this->shouldSave($log);

        $this->repository()->save($log);

        $this->shouldSave($log2);

        $this->repository()->save($log2);

        $logsDevolucion = [
            [
                'tipo' => LogReserva::TIPO_CREAR,
                'cantidad' => 1
            ],
            [
                'tipo' => LogReserva::TIPO_ACEPTAR,
                'cantidad' => 0
            ],
            [
                'tipo' => LogReserva::TIPO_CANCELAR,
                'cantidad' => 0
            ],
            [
                'tipo' => LogReserva::TIPO_ELIMINAR,
                'cantidad' => 1
            ]
        ];

        $this->shouldSearchToday(new DateTime(), $logsDevolucion);

        $this->finder->__invoke();
    }
}