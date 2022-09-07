<?php

namespace App\LogObjeto\Infrastructure\Persistence;

use App\LogObjeto\Domain\LogObjeto;
use App\LogObjeto\Domain\LogObjetoRepository;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;
use DateTime;

class LogObjetoRepositoryDoctrine extends DoctrineRepository implements LogObjetoRepository
{

    public function save(LogObjeto $logObjeto): void
    {
        $this->persist($logObjeto);
    }

    public function searchToday(DateTime $today): ?array
    {
        return $this->repository(LogObjeto::class)->createQueryBuilder('logObjeto')
            ->select('logObjeto.tipo, COUNT(logObjeto.id) as cantidad')
            ->where('logObjeto.fecha = :today')
            ->groupBy('logObjeto.tipo')
            ->orderBy('logObjeto.tipo', 'DESC')
            ->setParameter('today', $today->format('Y-m-d'))
            ->getQuery()->getArrayResult();
    }

    public function searchWeek(DateTime $date): ?array
    {
        return $this->repository(LogObjeto::class)->createQueryBuilder('logObjeto')
            ->select('logObjeto.fecha, logObjeto.tipo, COUNT(logObjeto.id) as cantidad')
            ->where('logObjeto.fecha >= :fecha')
            ->groupBy('logObjeto.fecha, logObjeto.tipo')
            ->orderBy('logObjeto.fecha', 'DESC')
            ->orderBy('logObjeto.tipo', 'DESC')
            ->setParameter('fecha', $date->format('Y-m-d'))
            ->getQuery()->getArrayResult();
    }
}