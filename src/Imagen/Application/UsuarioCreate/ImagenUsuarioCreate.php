<?php

namespace App\Imagen\Application\UsuarioCreate;

use App\Imagen\Domain\Imagen;
use App\Imagen\Domain\ImagenRepository;
use App\Usuario\Domain\Usuario;

class ImagenUsuarioCreate
{
    public function __construct(private ImagenRepository $repository)
    {
    }

    public function create(string $ruta, Usuario $usuario, ?string $descripcion): Imagen
    {
        $imagen = Imagen::create(null, $ruta, null, $usuario, $descripcion);
        $this->repository->save($imagen);
        return $imagen;
    }
}