<?php

namespace App\Imagen\Domain;

use App\Objeto\Domain\Objeto;
use App\Shared\Domain\Root\Root;
use App\Usuario\Domain\Usuario;

class Imagen extends Root
{
    public function __construct(
        private ?int     $id,
        private string  $ruta,
        private ?Objeto     $objeto,
        private ?Usuario     $usuario,
        private ?string $descripcion
    )
    {

    }

    public static function create(
        ?int     $id,
        string  $ruta,
        ?Objeto     $objeto,
        ?Usuario     $usuario,
        ?string $descripcion
    ): Imagen
    {
        return new self($id, $ruta, $objeto, $usuario, $descripcion);
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

    public function usuario(): Usuario
    {
        return $this->usuario;
    }

    public function update(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function cambiarRuta(string $ruta): void
    {
        $this->ruta = $ruta;
    }
}