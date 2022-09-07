<?php

namespace App\Categoria\Application\Create;

use App\Categoria\Domain\Categoria;
use App\Categoria\Domain\CategoriaRepository;

class CategoriaCreate
{
    public function __construct(private CategoriaRepository $repository)
    {
    }

    public function create(string $nombre, string $descripcion, ?Categoria $categoria): void
    {
        $categoria = Categoria::create($nombre, $descripcion, $categoria);
        $this->repository->save($categoria);
    }
}