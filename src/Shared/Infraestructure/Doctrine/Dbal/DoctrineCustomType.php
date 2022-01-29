<?php

namespace App\Shared\Infraestructure\Doctrine\Dbal;

interface DoctrineCustomType
{
    public static function customTypeName(): string;
}