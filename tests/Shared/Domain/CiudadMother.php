<?php

declare(strict_types=1);

namespace App\Tests\Shared\Domain;

class CiudadMother
{
    public static function create(): string
    {
        return MotherCreator::random()->city;
    }
}