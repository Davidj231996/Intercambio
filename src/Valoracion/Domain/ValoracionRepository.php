<?php

namespace App\Valoracion\Domain;

interface ValoracionRepository
{
    public function save(Valoracion $valoracion): void;

    public function search(int $usuarioId): ?Valoracion;
}