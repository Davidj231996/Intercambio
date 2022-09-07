<?php

namespace App\Categoria\Domain;

interface CategoriaRepository
{
    public function save(Categoria $categoria): void;

    public function search(int $id): ?Categoria;

    public function searchAll(): Categorias;

    public function searchForFilter(string $busqueda): ?Categorias;

    public function delete(Categoria $categoria): void;
}