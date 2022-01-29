<?php

namespace App\Valoracion\Domain;

use App\Shared\Domain\Root\Root;

class Valoracion extends Root
{
    public function __construct(
        private int $id,
        private int $usuarioId,
        private float $valor,
        private int $totales
    )
    {}

    public static function create(int $id, int $usuarioId, float $valor): Valoracion
    {
        return new self($id, $usuarioId, $valor, 1);
    }

    public function id(): int
    {
        return $this->id;
    }

    public function usuarioId(): int
    {
        return $this->usuarioId;
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