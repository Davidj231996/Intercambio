<?php

namespace App\Tests\Imagen\Domain;

use App\Imagen\Domain\Imagen;
use App\Objeto\Domain\Objeto;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Shared\Domain\IdMother;
use App\Tests\Shared\Domain\WordMother;
use App\Tests\Usuario\Domain\UsuarioMother;
use App\Usuario\Domain\Usuario;

class ImagenMother
{
    public static function createImagenObjeto(
        ?int    $id = null,
        ?string $ruta = null,
        ?Objeto $objeto = null,
        ?string $descripcion = null
    ): Imagen
    {
        return new Imagen(
            $id ?? IdMother::create(),
            $ruta ?? WordMother::create(),
            $objeto ?? ObjetoMother::create(),
            null,
            $descripcion ?? WordMother::create()
        );
    }

    public static function createImagenUsuario(
        ?int     $id = null,
        ?string  $ruta = null,
        ?Usuario $usuario = null,
        ?string  $descripcion = null
    ): Imagen
    {
        return new Imagen(
            $id ?? IdMother::create(),
            $ruta ?? WordMother::create(),
            null,
            $usuario ?? UsuarioMother::create(),
            $descripcion ?? WordMother::create()
        );
    }

    public static function newImagenObjeto(
        ?string $ruta = null,
        ?Objeto $objeto = null,
        ?string $descripcion = null
    ): Imagen
    {
        return new Imagen(
            null,
            $ruta ?? WordMother::create(),
            $objeto ?? ObjetoMother::create(),
            null,
            $descripcion ?? WordMother::create()
        );
    }

    public static function newImagenUsuario(
        ?string  $ruta = null,
        ?Usuario $usuario = null,
        ?string  $descripcion = null
    ): Imagen
    {
        return new Imagen(
            null,
            $ruta ?? WordMother::create(),
            null,
            $usuario ?? UsuarioMother::create(),
            $descripcion ?? WordMother::create()
        );
    }
}