<?php

namespace App\Chat\Infrastructure\Persistence;

use App\Chat\Domain\Chat;
use App\Chat\Domain\ChatRepository;
use App\Chat\Domain\Chats;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;
use App\Usuario\Domain\Usuario;

class ChatRepositoryDoctrine extends DoctrineRepository implements ChatRepository
{
    public function save(Chat $chat): void
    {
        $this->persist($chat);
    }

    public function search(int $id): ?Chat
    {
        return $this->repository(Chat::class)->find($id);
    }

    public function searchByUsuario(Usuario $usuario): ?Chats
    {
        return $this->repository(Chat::class)->createQueryBuilder('chat')
            ->where('chat.usuario1 = usuario OR chat.usuario2 = usuario')->setParameter('usuario', $usuario)
            ->getQuery()->execute();
    }
}