<?php

namespace App\LogObjeto\Application\TodayFinder;

use App\LogObjeto\Domain\LogObjeto;
use App\LogObjeto\Domain\LogObjetoRepository;
use DateTime;

class LogObjetoTodayFinder
{
    public function __construct(private LogObjetoRepository $repository)
    {}

    public function __invoke(): array
    {
        $logs = $this->repository->searchToday(new DateTime());
        $logsDevolucion = [
            LogObjeto::TIPO_CREAR => 0,
            LogObjeto::TIPO_EDITAR => 0,
            LogObjeto::TIPO_ELIMINAR => 0,
            LogObjeto::TIPO_HABILITAR => 0,
            LogObjeto::TIPO_DESHABILITAR => 0
        ];
        foreach ($logs as $log) {
            $logsDevolucion[$log['tipo']] = $log['cantidad'];
        }
        return $logsDevolucion;
    }
}