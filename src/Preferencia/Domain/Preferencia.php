<?php

namespace App\Preferencia\Domain;

use App\Categoria\Domain\Categoria;
use App\Shared\Domain\Root\Root;
use App\Usuario\Domain\Usuario;

class Preferencia extends Root
{
    public function __construct(
        private ?int $id,
        private Usuario $usuario,
        private Categoria $categoria
    )
    {
    }

    public static function create(?int $id, Usuario $usuario, Categoria $categoria): Preferencia
    {
        return new self($id, $usuario, $categoria);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function usuario(): Usuario
    {
        return $this->usuario;
    }

    public function categoria(): Categoria
    {
        return $this->categoria;
    }
}