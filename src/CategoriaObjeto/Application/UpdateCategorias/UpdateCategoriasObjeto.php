<?php

namespace App\CategoriaObjeto\Application\UpdateCategorias;

use App\CategoriaObjeto\Domain\CategoriaObjeto;
use App\CategoriaObjeto\Domain\CategoriaObjetoRepository;
use App\Objeto\Domain\Objeto;
use Doctrine\Common\Collections\ArrayCollection;

class UpdateCategoriasObjeto
{
    public function __construct(private CategoriaObjetoRepository $repository)
    {}

    public function updateCategoriasObjeto(array $categorias, Objeto $objeto)
    {
        foreach ($objeto->categorias() as $categoriaObjeto) {
            $this->repository->delete($categoriaObjeto);
        }
        $objeto->categorias()->clear();

        foreach ($categorias as $categoria) {
            $categoriaObjeto = CategoriaObjeto::create(null, $objeto, $categoria);
            $this->repository->save($categoriaObjeto);
        }
    }
}