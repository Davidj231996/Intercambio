<?php

namespace App\Imagen\Application\ObjetoCreate;

use App\Imagen\Domain\Imagen;
use App\Imagen\Domain\ImagenRepository;
use App\Objeto\Domain\Objeto;

class ImagenObjetoCreate
{
    public function __construct(private ImagenRepository $repository)
    {
    }

    public function create(string $ruta, Objeto $objeto, ?string $descripcion): Imagen
    {
        $imagen = Imagen::create(null, $ruta, $objeto, null, $descripcion);
        $this->repository->save($imagen);
        return $imagen;
    }
}