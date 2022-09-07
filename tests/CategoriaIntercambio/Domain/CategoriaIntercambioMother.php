<?php

namespace App\Tests\CategoriaIntercambio\Domain;

use App\Categoria\Domain\Categoria;
use App\CategoriaIntercambio\Domain\CategoriaIntercambio;
use App\Objeto\Domain\Objeto;
use App\Tests\Categoria\Domain\CategoriaMother;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Shared\Domain\IdMother;

class CategoriaIntercambioMother
{
    public static function create(
        ?int       $id = null,
        ?Objeto    $objeto = null,
        ?Categoria $categoria = null
    ): CategoriaIntercambio
    {
        return new CategoriaIntercambio(
            $id ?? IdMother::create(),
            $objeto ?? ObjetoMother::create(),
            $categoria ?? CategoriaMother::create()
        );
    }

    public static function new(
        ?Objeto    $objeto = null,
        ?Categoria $categoria = null
    ): CategoriaIntercambio
    {
        return new CategoriaIntercambio(
            null,
            $objeto ?? ObjetoMother::create(),
            $categoria ?? CategoriaMother::create()
        );
    }
}