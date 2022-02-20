<?php

namespace App\Categoria\Domain;

class CategoriasFinder
{
    public function __construct(private CategoriaRepository $repository)
    {}

    public function __invoke(): Categorias
    {
        return $this->repository->searchAll();
    }
}