<?php

namespace App\Imagen\Application\UsuarioCreate;

use App\Imagen\Domain\Imagen;
use App\Imagen\Domain\ImagenRepository;
use App\Usuario\Domain\Usuario;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImagenUsuarioCreate
{
    public function __construct(private ImagenRepository $repository)
    {
    }

    public function create(Usuario $usuario, UploadedFile $imagen): void
    {
        if ($usuario->imagen()) {
            $filesystem = new Filesystem();
            $filesystem->remove($usuario->imagen()->ruta());
            $usuario->imagen()->update($imagen->getClientOriginalName());
            $usuario->imagen()->cambiarRuta('/images/usuarios/' . $usuario->id() . '.' . $imagen->getClientOriginalExtension());
            $this->repository->save($usuario->imagen());
        } else {
            $imagenUsuario = Imagen::create(null, "images/usuarios/" . $usuario->id() . '.' . $imagen->getClientOriginalExtension(),
                null, $usuario, $imagen->getClientOriginalName());
            $this->repository->save($imagenUsuario);
        }

        $imagen->move('images/usuarios', $usuario->id() . '.' . $imagen->getClientOriginalExtension());
    }
}