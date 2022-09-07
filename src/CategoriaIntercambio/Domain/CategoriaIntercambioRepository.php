<?php

namespace App\CategoriaIntercambio\Domain;

interface CategoriaIntercambioRepository
{
    public function save(CategoriaIntercambio $categoriaIntercambio): void;

    public function delete(CategoriaIntercambio $categoriaIntercambio): void;
}