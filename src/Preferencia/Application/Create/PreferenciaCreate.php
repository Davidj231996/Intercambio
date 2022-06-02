<?php

namespace App\Preferencia\Application\Create;

use App\Categoria\Domain\Categoria;
use App\Preferencia\Domain\Preferencia;
use App\Preferencia\Domain\PreferenciaRepository;
use App\Usuario\Domain\Usuario;

class PreferenciaCreate
{
    public function __construct(private PreferenciaRepository $repository)
    {}

    public function create(Usuario $usuario, array $categorias): void
    {
        foreach ($usuario->preferencias() as $preferencia) {
            $this->repository->delete($preferencia);
        }
        $usuario->preferencias()->clear();

        /** @var Categoria $categoria */
        foreach ($categorias as $categoria) {
            $preferencia = Preferencia::create(null, $usuario, $categoria);
            $this->repository->save($preferencia);
        }
    }
}