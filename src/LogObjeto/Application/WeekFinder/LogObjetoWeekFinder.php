<?php

namespace App\LogObjeto\Application\WeekFinder;

use App\LogObjeto\Domain\LogObjeto;
use App\LogObjeto\Domain\LogObjetoRepository;
use DateInterval;
use DatePeriod;
use DateTime;

class LogObjetoWeekFinder
{
    public function __construct(private LogObjetoRepository $repository)
    {}

    public function __invoke(): array
    {
        $dateInterval = DateInterval::createFromDateString('6 days');
        $now = new DateTime();
        $date = $now->sub($dateInterval);
        $logs = $this->repository->searchWeek($date);

        // Generamos el array inicial de los datos del log
        $dateRange = new DatePeriod($now, DateInterval::createFromDateString('1 day'), $date);
        $array = [
            LogObjeto::TIPO_CREAR => 0,
            LogObjeto::TIPO_EDITAR => 0,
            LogObjeto::TIPO_ELIMINAR => 0,
            LogObjeto::TIPO_HABILITAR => 0,
            LogObjeto::TIPO_DESHABILITAR => 0
        ];
        $logsDevolucion = [];
        /** @var DateTime $date1 */
        foreach ($dateRange as $date1) {
            $logsDevolucion[$date1->format('dd/mm')] = $array;
        }

        // Rellenamos el array con los datos
        foreach ($logs as $log) {
            $logsDevolucion[$log['fecha']->format('dd/mm')][$log['tipo']] = $log['cantidad'];
        }
        return $logsDevolucion;
    }
}