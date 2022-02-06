<?php

namespace App\Imagen\Domain;

use App\Objeto\Domain\Objeto;
use App\Shared\Domain\Root\Root;

class Imagen extends Root
{
    public function __construct(
        private int     $id,
        private string  $ruta,
        private ?Objeto     $objeto,
        private ?int     $usuarioId,
        private ?string $descripcion
    )
    {

    }

    public static function create(
        int     $id,
        string  $ruta,
        ?Objeto     $objeto,
        ?int     $usuarioId,
        ?string $descripcion
    ): Imagen
    {
        return new self($id, $ruta, $objeto, $usuarioId, $descripcion);
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

    public function objeto(): Objeto
    {
        return $this->objeto;
    }

    public function usuarioId(): int
    {
        return $this->usuarioId;
    }

    public function update(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }
}