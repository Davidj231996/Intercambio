<?php

namespace App\Objeto\Infrastructure\Persistence;

use App\Objeto\Domain\Objeto;
use App\Objeto\Domain\ObjetoRepository;
use App\Objeto\Domain\Objetos;
use App\Shared\Domain\Criteria\Criteria;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineCriteriaConverter;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;
use App\Usuario\Domain\Usuario;
use Doctrine\ORM\Query;
use Doctrine\ORM\Query\Expr\Join;

final class ObjetoRepositoryDoctrine extends DoctrineRepository implements ObjetoRepository
{
    private static array $criteriaToDoctrineFields = [
        'nombre' => 'nombre',
        'descripcion' => 'descripcion'
    ];

    public function save(Objeto $objeto): void
    {
        $this->persist($objeto);
    }

    public function search(int $id): ?Objeto
    {
        return $this->repository(Objeto::class)->find($id);
    }

    public function searchByUsuario(Usuario $usuario): Query
    {
        return $this->repository(Objeto::class)->createQueryBuilder('objeto')
            ->where('objeto.usuario = :usuario')
            ->andWhere('objeto.estado = :estado')
            ->setParameter('usuario', $usuario)
            ->setParameter('estado', Objeto::ESTADO_PENDIENTE)
            ->getQuery();
    }

    public function searchHabilitadosByUsuario(Usuario $usuario): ?Objetos
    {
        $objetos = $this->repository(Objeto::class)->createQueryBuilder('objeto')
            ->where('objeto.estado = :estado AND objeto.usuario = :usuario')
            ->setParameter('usuario', $usuario)
            ->setParameter('estado', Objeto::ESTADO_PENDIENTE)
            ->getQuery()->execute();
        return new Objetos($objetos);
    }

    public function searchByCriteria(Criteria $criteria): ?Objetos
    {
        $doctrineCriteria = DoctrineCriteriaConverter::convert($criteria, self::$criteriaToDoctrineFields);
        $objetos = $this->repository(Objeto::class)->matching($doctrineCriteria)->toArray();

        return new Objetos($objetos);
    }

    public function searchByBusqueda(string $busqueda): ?Query
    {
        return $this->repository(Objeto::class)->createQueryBuilder('objeto')
            ->where('objeto.nombre LIKE :busqueda OR objeto.descripcion LIKE :busqueda')
            ->andWhere('objeto.estado <> :estado')
            ->setParameter('busqueda', '%' . $busqueda . '%')
            ->setParameter('estado', Objeto::ESTADO_DESHABILITADO)
            ->getQuery();
    }

    public function searchByBusquedaCategorias(string $busqueda, string $categorias): ?Query
    {
        return $this->repository(Objeto::class)->createQueryBuilder('objeto')
            ->innerJoin('objeto.categorias', 'categoriasObjeto', Join::WITH, 'categoriasObjeto.objeto = objeto.id')
            ->where('objeto.nombre LIKE :busqueda OR objeto.descripcion LIKE :busqueda')
            ->andWhere('objeto.estado <> :estado')
            ->andWhere('categoriasObjeto.categoria IN (:categorias)')
            ->setParameter('busqueda', '%' . $busqueda . '%')
            ->setParameter('estado', Objeto::ESTADO_DESHABILITADO)
            ->setParameter('categorias', $categorias)
            ->getQuery();
    }

    public function searchRecent(): ?Objetos
    {
        $objetos = $this->repository(Objeto::class)->createQueryBuilder('objeto')
            ->where('objeto.estado = :estado')
            ->setParameter('estado', Objeto::ESTADO_PENDIENTE)
            ->orderBy('objeto.fecha', 'DESC')
            ->setMaxResults(3)
            ->getQuery()->execute();

        return new Objetos($objetos);
    }

    public function delete(Objeto $objeto): void
    {
        $this->remove($objeto);
    }
}