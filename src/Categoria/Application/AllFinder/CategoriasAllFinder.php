<?php

namespace App\Categoria\Application\AllFinder;

use App\Categoria\Domain\CategoriaRepository;
use App\Categoria\Domain\Categorias;

class CategoriasAllFinder
{
    public function __construct(private CategoriaRepository $repository)
    {
    }

    public function __invoke(): Categorias
    {
        return $this->repository->searchAll();
    }
}