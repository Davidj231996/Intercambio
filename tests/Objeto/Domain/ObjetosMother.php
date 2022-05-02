<?php

namespace App\Tests\Objeto\Domain;

use App\Objeto\Domain\Objetos;

class ObjetosMother
{
    public static function create(array $objetos = []): Objetos
    {
        return new Objetos($objetos);
    }
}