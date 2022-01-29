<?php

namespace App\Imagen\Application\Update;

use App\Imagen\Domain\ImagenRepository;

class ImagenUpdate
{
    public function __construct(private ImagenRepository $repository)
    {
    }

    public function update(int $id, string $descripcion): void
    {
        $imagen = $this->repository->search($id);
        $imagen->update($descripcion);
        $this->repository->save($imagen);
    }
}