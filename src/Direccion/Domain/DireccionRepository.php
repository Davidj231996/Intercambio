<?php

namespace App\Direccion\Domain;

interface DireccionRepository
{
    public function save(Direccion $direccion): void;

    public function search(int $id): ?Direccion;
}