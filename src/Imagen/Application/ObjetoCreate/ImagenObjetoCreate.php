<?php

namespace App\Imagen\Application\ObjetoCreate;

use App\Imagen\Domain\Imagen;
use App\Imagen\Domain\ImagenRepository;
use App\Objeto\Domain\Objeto;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImagenObjetoCreate
{
    public function __construct(private ImagenRepository $repository)
    {
    }

    public function create(UploadedFile $imagen, Objeto $objeto): Imagen
    {
        $imagen->move('images/objetos', $objeto->id() . '.' . $imagen->getClientOriginalExtension());
        $imagenObjeto = Imagen::create(null, 'images/objetos/' . $objeto->id() . '.' . $imagen->getClientOriginalExtension(), $objeto, null, $imagen->getClientOriginalName());
        $this->repository->save($imagenObjeto);
        return $imagenObjeto;
    }
}