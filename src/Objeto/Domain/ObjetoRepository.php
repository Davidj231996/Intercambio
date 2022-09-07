<?php

declare(strict_types=1);

namespace App\Objeto\Domain;

use App\Shared\Domain\Criteria\Criteria;
use App\Usuario\Domain\Usuario;
use Doctrine\ORM\Query;

interface ObjetoRepository
{
    public function save(Objeto $objeto): void;

    public function search(int $id): ?Objeto;

    public function searchByUsuario(Usuario $usuario): Query;

    public function searchHabilitadosByUsuario(Usuario $usuario): ?Objetos;

    public function searchByCriteria(Criteria $criteria): ?Objetos;

    public function searchByBusqueda(string $busqueda): ?Query;

    public function searchByBusquedaCategorias(string $busqueda, string $categorias): ?Query;

    public function searchRecent(): ?Objetos;

    public function delete(Objeto $objeto): void;
}