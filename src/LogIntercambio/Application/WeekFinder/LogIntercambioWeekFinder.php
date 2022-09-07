<?php

namespace App\LogIntercambio\Application\WeekFinder;

use App\LogIntercambio\Domain\LogIntercambio;
use App\LogIntercambio\Domain\LogIntercambioRepository;
use DateInterval;
use DatePeriod;
use DateTime;

class LogIntercambioWeekFinder
{
    public function __construct(private LogIntercambioRepository $repository)
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
            LogIntercambio::TIPO_CREACION => 0,
            LogIntercambio::TIPO_ACEPTAR => 0,
            LogIntercambio::TIPO_CANCELAR => 0,
            LogIntercambio::TIPO_ENVIAR => 0,
            LogIntercambio::TIPO_FINALIZAR => 0
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