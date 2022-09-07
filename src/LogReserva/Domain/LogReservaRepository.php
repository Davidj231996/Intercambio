<?php

namespace App\LogReserva\Domain;

use DateTime;

interface LogReservaRepository
{
    public function save(LogReserva $logObjeto): void;

    public function searchToday(DateTime $today): ?array;

    public function searchWeek(DateTime $date): ?array;
}