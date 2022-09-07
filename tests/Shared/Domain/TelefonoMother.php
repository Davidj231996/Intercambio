<?php

declare(strict_types=1);

namespace App\Tests\Shared\Domain;

class TelefonoMother
{
    public static function create(): int
    {
        return MotherCreator::random()->numberBetween(0, 999999999);
    }
}