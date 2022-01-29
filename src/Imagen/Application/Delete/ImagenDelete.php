<?php

namespace App\Imagen\Application\Delete;

use App\Imagen\Domain\ImagenRepository;

class ImagenDelete
{
    public function __construct(private ImagenRepository $repository)
    {
    }

    public function delete(int $id): void
    {
        $imagen = $this->repository->search($id);
        $this->repository->delete($imagen);
    }
}