<?php

namespace App\Imagen\Application\Create;

use App\Imagen\Domain\Imagen;
use App\Imagen\Domain\ImagenRepository;
use App\Objeto\Domain\Objeto;

class ImagenCreator
{
    public function __construct(private ImagenRepository $repository)
    {
    }

    public function create(int $id, string $ruta, Objeto $objeto, ?string $descripcion): Imagen
    {
        $imagen = Imagen::create($id, $ruta, $objeto, null, $descripcion);
        $this->repository->save($imagen);
        return $imagen;
    }
}