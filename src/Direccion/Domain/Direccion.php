<?php

namespace App\Direccion\Domain;

use App\Shared\Domain\Root\Root;

class Direccion extends Root
{
    public function __construct(
        private int    $id,
        private string $direccion,
        private string $ciudad,
        private string $provincia,
        private string $comunidadAutonoma,
        private string $codigoPostal
    )
    {
    }

    public static function create(int $id, string $direccion, string $ciudad, string $provincia, string $comunidadAutonoma, string $codigoPostal): Direccion
    {
        return new self($id, $direccion, $ciudad, $provincia, $comunidadAutonoma, $codigoPostal);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function direccion(): string
    {
        return $this->direccion;
    }

    public function ciudad(): string
    {
        return $this->ciudad;
    }

    public function provincia(): string
    {
        return $this->provincia;
    }

    public function comunidadAutonoma(): string
    {
        return $this->comunidadAutonoma;
    }

    public function codigoPostal(): string
    {
        return $this->codigoPostal;
    }

    public function update(string $direccion, string $ciudad, string $provincia, string $comunidadAutonoma, string $codigoPostal)
    {
        $this->direccion = $direccion;
        $this->ciudad = $ciudad;
        $this->provincia = $provincia;
        $this->comunidadAutonoma = $comunidadAutonoma;
        $this->codigoPostal = $codigoPostal;
    }


}