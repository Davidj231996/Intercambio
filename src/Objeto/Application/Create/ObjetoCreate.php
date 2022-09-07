<?php


declare(strict_types=1);

namespace App\Objeto\Application\Create;

use App\Email\Application\ObjetoCreado\ObjetoCreadoEmail;
use App\LogObjeto\Application\Create\LogObjetoCreateCrear;
use App\Objeto\Domain\Objeto;
use App\Objeto\Domain\ObjetoRepository;
use App\Usuario\Domain\Usuario;
use DateTime;

final class ObjetoCreate
{
    public function __construct(
        private ObjetoRepository     $repository,
        private LogObjetoCreateCrear $logObjetoCreateCrear,
        private ObjetoCreadoEmail    $objetoCreadoEmail
    )
    {
    }

    public function create(string $nombre, string $descripcion, Usuario $usuario): Objeto
    {
        $now = new DateTime();
        $objeto = Objeto::create(null, $nombre, $descripcion, $usuario, $now);

        $this->repository->save($objeto);

        // Registramos en el log la creación del objeto
        $this->logObjetoCreateCrear->create($objeto);

        // Enviamos email de aviso al usuario
        $this->objetoCreadoEmail->send($objeto);

        return $objeto;
    }

}