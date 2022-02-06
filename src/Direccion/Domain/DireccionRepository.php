<?php

namespace App\Direccion\Domain;

use App\Usuario\Domain\Usuario;

interface DireccionRepository
{
    public function save(Direccion $direccion): void;

    public function search(int $id): ?Direccion;

    public function searchByUsuario(Usuario $usuario): ?Direccion;
}