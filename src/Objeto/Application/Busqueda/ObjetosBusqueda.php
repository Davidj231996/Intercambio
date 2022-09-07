<?php

namespace App\Objeto\Application\Busqueda;

use App\Categoria\Domain\CategoriaRepository;
use App\Objeto\Domain\ObjetoRepository;
use Doctrine\ORM\Tools\Pagination\Paginator;

class ObjetosBusqueda
{
    public function __construct(private ObjetoRepository $repository, private CategoriaRepository $categoriaRepository)
    {
    }

    public function busqueda(string $busqueda, ?array $categorias): array
    {
        if (!empty($categorias)) {
            $categoriasBusqueda = implode(",", $categorias);
            $query = $this->repository->searchByBusquedaCategorias($busqueda, $categoriasBusqueda);
        } else {
            $query = $this->repository->searchByBusqueda($busqueda);
        }

        return [
            'paginator' => new Paginator($query),
            'categorias' => $this->categoriaRepository->searchForFilter($busqueda)
        ];
    }
}