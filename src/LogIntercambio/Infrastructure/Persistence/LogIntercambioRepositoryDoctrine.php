<?php

namespace App\LogIntercambio\Infrastructure\Persistence;

use App\LogIntercambio\Domain\LogIntercambio;
use App\LogIntercambio\Domain\LogIntercambioRepository;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;
use DateTime;

class LogIntercambioRepositoryDoctrine extends DoctrineRepository implements LogIntercambioRepository
{

    public function save(LogIntercambio $logIntercambio): void
    {
        $this->persist($logIntercambio);
    }

    public function searchToday(DateTime $today): ?array
    {
        return $this->repository(LogIntercambio::class)->createQueryBuilder('logIntercambio')
            ->select('logIntercambio.tipo, COUNT(logIntercambio.id) as cantidad')
            ->where('logIntercambio.fecha = :today')
            ->groupBy('logIntercambio.tipo')
            ->orderBy('logIntercambio.tipo', 'DESC')
            ->setParameter('today', $today->format('Y-m-d'))
            ->getQuery()->getArrayResult();
    }

    public function searchWeek(DateTime $date): ?array
    {
        return $this->repository(LogIntercambio::class)->createQueryBuilder('logIntercambio')
            ->select('logIntercambio.fecha, logIntercambio.tipo, COUNT(logIntercambio.id) as cantidad')
            ->where('logIntercambio.fecha >= :fecha')
            ->groupBy('logIntercambio.fecha, logIntercambio.tipo')
            ->orderBy('logIntercambio.fecha', 'DESC')
            ->orderBy('logIntercambio.tipo', 'DESC')
            ->setParameter('fecha', $date->format('Y-m-d'))
            ->getQuery()->getArrayResult();
    }
}