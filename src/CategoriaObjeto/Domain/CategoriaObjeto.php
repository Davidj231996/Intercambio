<?php

namespace App\CategoriaObjeto\Domain;

use App\Categoria\Domain\Categoria;
use App\Objeto\Domain\Objeto;
use App\Shared\Domain\Root\Root;

class CategoriaObjeto extends Root
{
    public function __construct(
        private ?int $id,
        private Objeto $objeto,
        private Categoria $categoria
    )
    {}

    public static function create(?int $id, Objeto $objeto, Categoria $categoria): CategoriaObjeto
    {
        return new self($id, $objeto, $categoria);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function objeto(): Objeto
    {
        return $this->objeto;
    }

    public function categoria(): Categoria
    {
        return $this->categoria;
    }
}