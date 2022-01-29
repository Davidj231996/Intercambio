<?php

namespace App\Imagen\Domain;

use App\Shared\Domain\Root\Root;

class Imagen extends Root
{
    public function __construct(
        private int     $id,
        private string  $ruta,
        private ?string $descripcion
    )
    {

    }

    public static function create(
        int     $id,
        string  $ruta,
        ?string $descripcion
    ): Imagen
    {
        return new self($id, $ruta, $descripcion);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function descripcion(): string
    {
        return $this->descripcion;
    }

    public function ruta(): string
    {
        return $this->ruta;
    }

    public function update(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }
}