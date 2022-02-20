<?php


declare(strict_types=1);

namespace App\Objeto\Application\Create;

use App\Imagen\Domain\Imagenes;
use App\Objeto\Domain\Objeto;
use App\Objeto\Domain\ObjetoRepository;
use App\Usuario\Domain\Usuario;

final class ObjetoCreate
{
    public function __construct(private ObjetoRepository $repository)
    {
    }

    public function create(array $objetoRequest, Usuario $usuario): Objeto
    {
        $objeto = Objeto::create(null, $objetoRequest['nombre'], $objetoRequest['descripcion'], 0, $usuario);

        $this->repository->save($objeto);

        return $objeto;
    }

}