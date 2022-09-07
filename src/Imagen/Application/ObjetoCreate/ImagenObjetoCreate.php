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
        $imagenObjeto = Imagen::create(null, 'images/objetos/' . $objeto->id() . '.' . $imagen->getClientOriginalExtension(), $objeto, null, $imagen->getClientOriginalName());
        $this->repository->save($imagenObjeto);

        $imagen->move('images/objetos', $imagenObjeto->id() . '.' . $imagen->getClientOriginalExtension());
        $imagenObjeto->cambiarRuta('images/objetos/' . $imagenObjeto->id() . '.' . $imagen->getClientOriginalExtension());
        return $imagenObjeto;
    }
}