<?php

namespace App\LogReserva\Application\WeekFinder;

use App\LogReserva\Domain\LogReserva;
use App\LogReserva\Domain\LogReservaRepository;
use DateInterval;
use DatePeriod;
use DateTime;

class LogReservaWeekFinder
{
    public function __construct(private LogReservaRepository $repository)
    {
    }

    public function __invoke(): array
    {
        $dateInterval = DateInterval::createFromDateString('6 days');
        $now = new DateTime();
        $date = $now->sub($dateInterval);
        $logs = $this->repository->searchWeek($date);

        // Generamos el array inicial de los datos del log
        $dateRange = new DatePeriod($now, DateInterval::createFromDateString('1 day'), $date);
        $array = [
            LogReserva::TIPO_CREAR => 0,
            LogReserva::TIPO_ACEPTAR => 0,
            LogReserva::TIPO_CANCELAR => 0,
            LogReserva::TIPO_ELIMINAR => 0
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