<?php

namespace App\Imagen\Domain;

interface ImagenRepository
{
    public function save(Imagen $imagen): void;

    public function search(int $id): ?Imagen;

    public function delete(Imagen $imagen): void;
}