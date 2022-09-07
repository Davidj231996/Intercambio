<?php

namespace App\Categoria\Infrastructure\Persistence;

use App\Categoria\Domain\Categoria;
use App\Categoria\Domain\CategoriaRepository;
use App\Categoria\Domain\Categorias;
use App\Objeto\Domain\Objeto;
use App\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;
use Doctrine\ORM\Query\Expr\Join;

class CategoriaRepositoryDoctrine extends DoctrineRepository implements CategoriaRepository
{
    private static array $criteriaToDoctrineFields = [
        'id' => 'id',
        'nombre' => 'nombre',
        'descripcion' => 'descripcion'
    ];

    public function save(Categoria $categoria): void
    {
        $this->persist($categoria);
    }

    public function search(int $id): ?Categoria
    {
        return $this->repository(Categoria::class)->find($id);
    }

    public function searchAll(): Categorias
    {
        $categorias = $this->repository(Categoria::class)->findAll();
        return new Categorias($categorias);
    }

    public function searchForFilter(string $busqueda): ?Categorias
    {
        $categorias = $this->repository(Categoria::class)->createQueryBuilder('categoria')
            ->select('categoria')
            ->innerJoin('categoria.objetos', 'categoriasObjeto', Join::WITH, 'categoria.id = categoriasObjeto.categoria')
            ->innerJoin('categoriasObjeto.objeto', 'objeto', Join::WITH, 'categoriasObjeto.objeto = objeto.id')
            ->where('objeto.nombre LIKE :busqueda OR objeto.descripcion LIKE :busqueda')
            ->andWhere('objeto.estado <> :inactivo')
            ->groupBy('categoria.id')
            ->setParameter('busqueda', '%' . $busqueda . '%')
            ->setParameter('inactivo', Objeto::ESTADO_DESHABILITADO)
            ->getQuery()->execute();

        return new Categorias($categorias);
    }

    public function delete(Categoria $categoria): void
    {
        $this->remove($categoria);
    }
}