<?php

namespace App\Valoracion\Domain;

use App\Shared\Domain\Root\Root;
use App\Usuario\Domain\Usuario;

class Valoracion extends Root
{
    public function __construct(
        private int $id,
        private Usuario $usuario,
        private float $valor,
        private int $totales
    )
    {}

    public static function create(int $id, Usuario $usuario, float $valor): Valoracion
    {
        return new self($id, $usuario, $valor, 1);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function usuario(): Usuario
    {
        return $this->usuario;
    }

    public function valor(): float
    {
        return $this->valor;
    }

    public function totales(): int
    {
        return $this->totales;
    }

    public function add(float $valor): void
    {
        $this->valor = $valor;
        $this->totales++;
    }

    public function valoracionTotal(): float
    {
        return $this->valor() * $this->totales();
    }
}