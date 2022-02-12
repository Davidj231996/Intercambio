<?php


declare(strict_types=1);

namespace App\Objeto\Application\Create;

use App\Imagen\Domain\Imagenes;
use App\Objeto\Domain\Objeto;
use App\Objeto\Domain\ObjetoRepository;
use App\Usuario\Domain\Usuario;

final class ObjetoCreator
{
    public function __construct(private ObjetoRepository $repository)
    {
    }

    public function create(int $id, string $nombre, string $descripcion, int $estado, Usuario $usuario): Objeto
    {
        $objeto = Objeto::create($id, $nombre, $descripcion, $estado, $usuario);

        $this->repository->save($objeto);

        return $objeto;
    }

}