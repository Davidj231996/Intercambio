<?php

namespace App\Imagen\Application\Create;

use App\Imagen\Domain\Imagen;
use App\Imagen\Domain\ImagenRepository;

class ImagenCreator
{
    public function __construct(private ImagenRepository $repository)
    {
    }

    public function create(int $id, string $ruta, ?string $descripcion): Imagen
    {
        $imagen = Imagen::create($id, $ruta, $descripcion);
        $this->repository->save($imagen);
        return $imagen;
    }
}