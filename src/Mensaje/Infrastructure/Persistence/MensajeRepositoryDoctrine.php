<?php

namespace App\Mensaje\Infrastructure\Persistence;

use App\Chat\Domain\Chat;
use App\Mensaje\Domain\Mensaje;
use App\Mensaje\Domain\MensajeRepository;
use App\Mensaje\Domain\Mensajes;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

class MensajeRepositoryDoctrine extends DoctrineRepository implements MensajeRepository
{
    public function save(Mensaje $mensaje): void
    {
        $this->persist($mensaje);
    }

    public function search(int $id): ?Mensaje
    {
        return $this->repository(Mensaje::class)->find($id);
    }

    public function searchByChat(Chat $chat): ?Mensajes
    {
        $mensajes = $this->repository(Mensaje::class)->findBy(['chat' => $chat]);

        return new Mensajes($mensajes);
    }
}