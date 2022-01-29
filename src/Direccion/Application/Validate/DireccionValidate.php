<?php

namespace App\Direccion\Application\Validate;

class DireccionValidate
{
    public function __construct()
    {}

    public function validate(string $direccion, string $ciudad, string $provincia, string $comunidadAutonoma, string $codigoPostal): bool
    {
        return true;
    }
}