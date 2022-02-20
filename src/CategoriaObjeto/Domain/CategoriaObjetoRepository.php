<?php

namespace App\CategoriaObjeto\Domain;

interface CategoriaObjetoRepository
{
    public function save(CategoriaObjeto $categoriaObjeto): void;

    public function delete(CategoriaObjeto $categoriaObjeto): void;
}