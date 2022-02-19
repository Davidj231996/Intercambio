<?php

namespace App\Objeto\Application\Busqueda;

use App\Objeto\Domain\ObjetoRepository;
use App\Objeto\Domain\Objetos;
use App\Shared\Domain\Criteria\Criteria;
use App\Shared\Domain\Criteria\Filter;
use App\Shared\Domain\Criteria\FilterOperator;
use App\Shared\Domain\Criteria\Filters;
use App\Shared\Domain\Criteria\Order;

class ObjetosBusqueda
{
    public function __construct(private ObjetoRepository $repository)
    {}

    public function busqueda(String $busqueda): ?Objetos
    {
        $filterNombre = Filter::fromValues([
            'field' => 'nombre',
            'operator' => FilterOperator::CONTAINS,
            'value' => $busqueda
        ]);
        $filterDescripcion = Filter::fromValues([
            'field' => 'nombre',
            'operator' => FilterOperator::CONTAINS,
            'value' => $busqueda
        ]);

        $criteria = new Criteria(new Filters([$filterNombre, $filterDescripcion]), Order::none(), null, null);

        return $this->repository->searchByCriteria($criteria);
    }
}