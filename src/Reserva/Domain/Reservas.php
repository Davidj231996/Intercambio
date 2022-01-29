<?php

namespace App\Reserva\Domain;

use App\Shared\Domain\Collection;

class Reservas extends Collection
{

    protected function type(): string
    {
        return Reserva::class;
    }
}