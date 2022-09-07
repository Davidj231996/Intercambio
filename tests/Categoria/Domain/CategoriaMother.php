<?php

namespace App\Tests\Categoria\Domain;

use App\Categoria\Domain\Categoria;
use App\Tests\Shared\Domain\IdMother;
use App\Tests\Shared\Domain\WordMother;

class CategoriaMother
{
    public static function create(
        ?int    $id = null,
        ?string $nombre = null,
        ?string $descripcion = null
    ): Categoria
    {
        return new Categoria(
            $id ?? IdMother::create(),
            $nombre ?? WordMother::create(),
            $descripcion ?? WordMother::create(),
            null
        );
    }

    public static function createSubCategoria(
        ?int       $id = null,
        ?string    $nombre = null,
        ?string    $descripcion = null,
        ?Categoria $categoria = null
    ): Categoria
    {
        return new Categoria(
            $id ?? IdMother::create(),
            $nombre ?? WordMother::create(),
            $descripcion ?? WordMother::create(),
            $categoria ?? self::new(),
        );
    }

    public static function new(
        ?string $nombre = null,
        ?string $descripcion = null
    ): Categoria
    {
        return new Categoria(
            null,
            $nombre ?? WordMother::create(),
            $descripcion ?? WordMother::create(),
            null
        );
    }

    public static function newSubCategoria(
        ?string    $nombre = null,
        ?string    $descripcion = null,
        ?Categoria $categoria = null
    ): Categoria
    {
        return new Categoria(
            null,
            $nombre ?? WordMother::create(),
            $descripcion ?? WordMother::create(),
            $categoria ?? self::new()
        );
    }
}