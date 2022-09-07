<?php

namespace App\Tests\LogReserva\Application\WeekFinder;

use App\LogReserva\Domain\LogReserva;
use App\Tests\LogReserva\Domain\LogReservaMother;
use App\Tests\LogReserva\LogReservaModuleUnitCase;
use DateTime;

class LogReservaWeekFinderTest extends LogReservaModuleUnitCase
{
    /** @test */
    public function devuelve_log_reservas_semana()
    {
        $log = LogReservaMother::create(fecha: new DateTime(), estado: LogReserva::TIPO_CREAR);
        $log2 = LogReservaMother::create(fecha: new DateTime(), estado: LogReserva::TIPO_ELIMINAR);

        $this->shouldSave($log);

        $this->repository()->save($log);

        $this->shouldSave($log2);

        $this->repository()->save($log2);

        /** @var DateTime $today */
        $today = new DateTime();
        $logsDevolucion = [];

        for ($i = 0; $i < 7; $i++) {
            $cantidad = ($today->format('dd/mm') == (new DateTime())->format('dd/mm')) ? 1 : 0;
            $logsDevolucion[] = [
                'fecha' => $today->format('dd/mm'),
                'tipo' => LogReserva::TIPO_CREAR,
                'cantidad' => $cantidad
            ];
            $logsDevolucion[] = [
                'fecha' => $today->format('dd/mm'),
                'tipo' => LogReserva::TIPO_ACEPTAR,
                'cantidad' => 0
            ];
            $logsDevolucion[] = [
                'fecha' => $today->format('dd/mm'),
                'tipo' => LogReserva::TIPO_CANCELAR,
                'cantidad' => 0
            ];
            $logsDevolucion[] = [
                'fecha' => $today->format('dd/mm'),
                'tipo' => LogReserva::TIPO_ELIMINAR,
                'cantidad' => $cantidad
            ];
            $today->modify('-1 day');
        }

        $this->shouldSearchWeek(new DateTime(), $logsDevolucion);

        $this->repository()->searchWeek(new DateTime());
    }
}