<?php

namespace App\LogObjeto\Domain;

use DateTime;

interface LogObjetoRepository
{
    public function save(LogObjeto $logObjeto): void;

    public function searchToday(DateTime $today): ?array;

    public function searchWeek(DateTime $date): ?array;
}