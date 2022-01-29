<?php

namespace App\Categoria\Domain;

class CategoriaFinder
{
    public function __construct(private CategoriaRepository $repository)
    {}

    public function __invoke(int $id): Categoria
    {
        $categoria = $this->repository->search($id);

        if ($categoria === null) {
            throw new CategoriaNotFound($id);
        }

        return $categoria;
    }
}