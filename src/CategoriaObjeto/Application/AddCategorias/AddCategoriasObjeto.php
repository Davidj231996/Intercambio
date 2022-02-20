<?php

namespace App\CategoriaObjeto\Application\AddCategorias;

use App\Categoria\Domain\CategoriaFinder;
use App\CategoriaObjeto\Domain\CategoriaObjeto;
use App\CategoriaObjeto\Domain\CategoriaObjetoRepository;
use App\Objeto\Domain\Objeto;
use Doctrine\Common\Collections\ArrayCollection;

class AddCategoriasObjeto
{
    public function __construct(private CategoriaObjetoRepository $repository)
    {}

    public function addCategoriasObjeto(ArrayCollection $categorias, Objeto $objeto)
    {
        foreach ($categorias as $categoria) {
            $categoriaObjeto = CategoriaObjeto::create(null, $objeto, $categoria);
            $this->repository->save($categoriaObjeto);
        }
    }
}