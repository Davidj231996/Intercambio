<?php

namespace App\LogReserva\Infrastructure\Persistence;

use App\LogReserva\Domain\LogReserva;
use App\LogReserva\Domain\LogReservaRepository;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;
use DateTime;

class LogReservaRepositoryDoctrine extends DoctrineRepository implements LogReservaRepository
{

    public function save(LogReserva $logReserva): void
    {
        $this->persist($logReserva);
    }

    public function searchToday(DateTime $today): ?array
    {
        return $this->repository(LogReserva::class)->createQueryBuilder('logReserva')
            ->select('logReserva.tipo, COUNT(logReserva.id) as cantidad')
            ->where('logReserva.fecha = :today')
            ->groupBy('logReserva.tipo')
            ->orderBy('logReserva.tipo', 'DESC')
            ->setParameter('today', $today->format('Y-m-d'))
            ->getQuery()->getArrayResult();
    }

    public function searchWeek(DateTime $date): ?array
    {
        return $this->repository(LogReserva::class)->createQueryBuilder('logReserva')
            ->select('logReserva.fecha, logReserva.tipo, COUNT(logReserva.id) as cantidad')
            ->where('logReserva.fecha >= :fecha')
            ->groupBy('logReserva.fecha, logReserva.tipo')
            ->orderBy('logReserva.fecha', 'DESC')
            ->orderBy('logReserva.tipo', 'DESC')
            ->setParameter('fecha', $date->format('Y-m-d'))
            ->getQuery()->getArrayResult();
    }
}