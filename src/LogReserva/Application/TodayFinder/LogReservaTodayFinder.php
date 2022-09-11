<?php

namespace App\LogReserva\Application\TodayFinder;

use App\LogReserva\Domain\LogReserva;
use App\LogReserva\Domain\LogReservaRepository;
use DateTime;

class LogReservaTodayFinder
{
    public function __construct(private LogReservaRepository $repository)
    {
    }

    public function __invoke(): array
    {
        $logs = $this->repository->searchToday(new DateTime());
        $logsDevolucion = [
            LogReserva::TIPO_CREAR => 0,
            LogReserva::TIPO_ACEPTAR => 0,
            LogReserva::TIPO_CANCELAR => 0,
            LogReserva::TIPO_ELIMINAR => 0
        ];
        foreach ($logs as $log) {
            $logsDevolucion[$log['tipo']] = $log['cantidad'];
        }
        return $logsDevolucion;
    }
}