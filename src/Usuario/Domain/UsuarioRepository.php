<?php

namespace App\Usuario\Domain;

use App\Shared\Domain\Criteria\Criteria;

interface UsuarioRepository
{
    public function save(Usuario $usuario): void;

    public function search(int $id): ?Usuario;

    public function searchByCriteria(Criteria $criteria): Usuarios;
}