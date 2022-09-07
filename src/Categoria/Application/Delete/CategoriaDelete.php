<?php

namespace App\Categoria\Application\Delete;

use App\Categoria\Domain\CategoriaNotFound;
use App\Categoria\Domain\CategoriaRepository;

class CategoriaDelete
{
    public function __construct(private CategoriaRepository $repository)
    {
    }

    public function delete(int $id): void
    {
        $categoria = $this->repository->search($id);

        if ($categoria === null) {
            throw new CategoriaNotFound($id);
        }

        $this->repository->delete($categoria);
    }
}