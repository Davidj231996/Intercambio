<?php


declare(strict_types=1);

namespace App\Objeto\Application\Create;

use App\Objeto\Domain\Objeto;
use App\Objeto\Domain\ObjetoRepository;

final class ObjetoCreator
{
    public function __construct(private ObjetoRepository $repository)
    {
    }

    public function create(int $id, string $nombre, string $descripcion, int $estado, int $usuarioId): Objeto
    {
        $objeto = Objeto::create($id, $nombre, $descripcion, $estado, $usuarioId);

        $this->repository->save($objeto);

        return $objeto;
    }

}