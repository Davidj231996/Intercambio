<?php

namespace App\CategoriaIntercambio\Application\UpdateCategorias;

use App\CategoriaIntercambio\Domain\CategoriaIntercambio;
use App\CategoriaIntercambio\Domain\CategoriaIntercambioRepository;
use App\Objeto\Domain\Objeto;

class UpdateCategoriasObjetoIntercambio
{
    public function __construct(private CategoriaIntercambioRepository $repository)
    {
    }

    public function updateCategoriasObjetoIntercambio(array $categorias, Objeto $objeto): void
    {
        foreach ($objeto->categoriasIntercambio() as $categoriaIntercambio) {
            $this->repository->delete($categoriaIntercambio);
        }
        $objeto->categoriasIntercambio()->clear();

        foreach ($categorias as $categoria) {
            $categoriaObjeto = CategoriaIntercambio::create(null, $objeto, $categoria);
            $this->repository->save($categoriaObjeto);
        }
    }
}