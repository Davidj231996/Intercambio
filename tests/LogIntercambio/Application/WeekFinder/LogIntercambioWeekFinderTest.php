<?php

namespace App\Tests\LogIntercambio\Application\WeekFinder;

use App\LogIntercambio\Domain\LogIntercambio;
use App\Tests\LogIntercambio\Domain\LogIntercambioMother;
use App\Tests\LogIntercambio\LogIntercambioModuleUnitCase;
use DateTime;

class LogIntercambioWeekFinderTest extends LogIntercambioModuleUnitCase
{
    /** @test */
    public function devuelve_log_objetos_semana()
    {
        $log = LogIntercambioMother::create(fecha: new DateTime(), estado: LogIntercambio::TIPO_CREACION);
        $log2 = LogIntercambioMother::create(fecha: new DateTime(), estado: LogIntercambio::TIPO_FINALIZAR);

        $this->shouldSave($log);

        $this->repository()->save($log);

        $this->shouldSave($log2);

        $this->repository()->save($log2);

        $today = new DateTime();
        $logsDevolucion = [];

        for ($i = 0; $i < 7; $i++) {
            $cantidad = ($today->format('dd/mm') == (new DateTime())->format('dd/mm')) ? 1 : 0;
            $logsDevolucion[] = [
                'fecha' => $today->format('dd/mm'),
                'tipo' => LogIntercambio::TIPO_CREACION,
                'cantidad' => $cantidad
            ];
            $logsDevolucion[] = [
                'fecha' => $today->format('dd/mm'),
                'tipo' => LogIntercambio::TIPO_ACEPTAR,
                'cantidad' => 0
            ];
            $logsDevolucion[] = [
                'fecha' => $today->format('dd/mm'),
                'tipo' => LogIntercambio::TIPO_CANCELAR,
                'cantidad' => 0
            ];
            $logsDevolucion[] = [
                'fecha' => $today->format('dd/mm'),
                'tipo' => LogIntercambio::TIPO_ENVIAR,
                'cantidad' => 0
            ];
            $logsDevolucion[] = [
                'fecha' => $today->format('dd/mm'),
                'tipo' => LogIntercambio::TIPO_FINALIZAR,
                'cantidad' => $cantidad
            ];
            $today->modify('-1 day');
        }

        $this->shouldSearchWeek(new DateTime(), $logsDevolucion);

        $this->repository()->searchWeek(new DateTime());
    }
}