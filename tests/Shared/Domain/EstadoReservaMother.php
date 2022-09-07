<?php

declare(strict_types=1);

namespace App\Tests\Shared\Domain;

class EstadoReservaMother
{
    public static function create(): int
    {
        return MotherCreator::random()->numberBetween(-1, 1);
    }
}