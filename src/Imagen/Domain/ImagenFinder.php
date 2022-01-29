<?php

namespace App\Imagen\Domain;

class ImagenFinder
{
    public function __construct(private ImagenRepository $repository)
    {}

    public function __invoke(int $id): Imagen
    {
        $imagen = $this->repository->search($id);

        if ($imagen === null) {
            throw new ImagenNotFound($id);
        }

        return $imagen;
    }
}