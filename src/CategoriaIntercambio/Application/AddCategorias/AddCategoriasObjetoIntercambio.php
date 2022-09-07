<?php

namespace App\CategoriaIntercambio\Application\AddCategorias;

use App\CategoriaIntercambio\Domain\CategoriaIntercambio;
use App\CategoriaIntercambio\Domain\CategoriaIntercambioRepository;
use App\Objeto\Domain\Objeto;
use Doctrine\Common\Collections\ArrayCollection;

class AddCategoriasObjetoIntercambio
{
    public function __construct(private CategoriaIntercambioRepository $repository)
    {
    }

    public function addCategoriasObjetoIntercambio(ArrayCollection $categorias, Objeto $objeto): void
    {
        foreach ($categorias as $categoria) {
            $categoriaObjeto = CategoriaIntercambio::create(null, $objeto, $categoria);
            $this->repository->save($categoriaObjeto);
        }
    }
}