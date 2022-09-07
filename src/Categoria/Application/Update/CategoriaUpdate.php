<?php

namespace App\Categoria\Application\Update;

use App\Categoria\Domain\Categoria;
use App\Categoria\Domain\CategoriaRepository;

class CategoriaUpdate
{
    public function __construct(private CategoriaRepository $repository)
    {
    }

    public function update(Categoria $categoria, string $nombre, string $descripcion, ?Categoria $categoriaPadre): void
    {
        $categoria->update($nombre, $descripcion, $categoriaPadre);
        $this->repository->save($categoria);
    }
}