<?php

declare(strict_types=1);

namespace App\Tests\Shared\Domain;

class EstadoLogIntercambioMother
{
    public static function create(): int
    {
        return MotherCreator::random()->numberBetween(1, 5);
    }
}