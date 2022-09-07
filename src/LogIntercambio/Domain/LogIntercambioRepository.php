<?php

namespace App\LogIntercambio\Domain;

use DateTime;

interface LogIntercambioRepository
{
    public function save(LogIntercambio $logIntercambio): void;

    public function searchToday(DateTime $today): ?array;

    public function searchWeek(DateTime $date): ?array;
}