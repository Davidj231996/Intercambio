<?php

namespace App\Tests\CategoriaObjeto\Domain;

use App\Categoria\Domain\Categoria;
use App\CategoriaObjeto\Domain\CategoriaObjeto;
use App\Objeto\Domain\Objeto;
use App\Tests\Categoria\Domain\CategoriaMother;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Shared\Domain\IdMother;

class CategoriaObjetoMother
{
    public static function create(
        ?int       $id = null,
        ?Objeto    $objeto = null,
        ?Categoria $categoria = null
    ): CategoriaObjeto
    {
        return new CategoriaObjeto(
            $id ?? IdMother::create(),
            $objeto ?? ObjetoMother::create(),
            $categoria ?? CategoriaMother::create()
        );
    }

    public static function new(
        ?Objeto    $objeto = null,
        ?Categoria $categoria = null
    ): CategoriaObjeto
    {
        return new CategoriaObjeto(
            null,
            $objeto ?? ObjetoMother::create(),
            $categoria ?? CategoriaMother::create(),
            null
        );
    }
}