<?php

declare(strict_types=1);

namespace App\Tests\Shared\Domain;

class EstadoUsuarioMother
{
    public static function create(): int
    {
        return MotherCreator::random()->randomKey([-1, 1]);
    }
}