<?php

namespace App\LogIntercambio\Application\TodayFinder;

use App\LogIntercambio\Domain\LogIntercambio;
use App\LogIntercambio\Domain\LogIntercambioRepository;
use DateTime;

class LogIntercambioTodayFinder
{
    public function __construct(private LogIntercambioRepository $repository)
    {}

    public function __invoke(): array
    {
        $logs = $this->repository->searchToday(new DateTime());
        $logsDevolucion = [
            LogIntercambio::TIPO_CREACION => 0,
            LogIntercambio::TIPO_ACEPTAR => 0,
            LogIntercambio::TIPO_CANCELAR => 0,
            LogIntercambio::TIPO_ENVIAR => 0,
            LogIntercambio::TIPO_FINALIZAR => 0
        ];
        foreach ($logs as $log) {
            $logsDevolucion[$log['tipo']] = $log['cantidad'];
        }
        return $logsDevolucion;
    }
}