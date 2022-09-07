<?php

namespace App\Tests\LogObjeto\Application\WeekFinder;

use App\LogObjeto\Domain\LogObjeto;
use App\Tests\LogObjeto\Domain\LogObjetoMother;
use App\Tests\LogObjeto\LogObjetoModuleUnitCase;
use DateTime;

class LogObjetoWeekFinderTest extends LogObjetoModuleUnitCase
{
        /** @test */
    public function devuelve_log_objetos_semana()
    {
        $log = LogObjetoMother::create(fecha: new DateTime(), estado: LogObjeto::TIPO_CREAR);
        $log2 = LogObjetoMother::create(fecha: new DateTime(), estado: LogObjeto::TIPO_ELIMINAR);

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
                'tipo' => LogObjeto::TIPO_CREAR,
                'cantidad' => $cantidad
            ];
            $logsDevolucion[] = [
                'fecha' => $today->format('dd/mm'),
                'tipo' => LogObjeto::TIPO_EDITAR,
                'cantidad' => 0
            ];
            $logsDevolucion[] = [
                'fecha' => $today->format('dd/mm'),
                'tipo' => LogObjeto::TIPO_ELIMINAR,
                'cantidad' => $cantidad
            ];
            $logsDevolucion[] = [
                'fecha' => $today->format('dd/mm'),
                'tipo' => LogObjeto::TIPO_HABILITAR,
                'cantidad' => 0
            ];
            $logsDevolucion[] = [
                'fecha' => $today->format('dd/mm'),
                'tipo' => LogObjeto::TIPO_DESHABILITAR,
                'cantidad' => 0
            ];
            $today->modify('-1 day');
        }

        $this->shouldSearchWeek(new DateTime(), $logsDevolucion);

        $this->repository()->searchWeek(new DateTime());
    }
}