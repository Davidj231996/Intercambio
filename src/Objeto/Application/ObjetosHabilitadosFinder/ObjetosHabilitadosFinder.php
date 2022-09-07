<?php

namespace App\Objeto\Application\ObjetosHabilitadosFinder;

use App\Objeto\Domain\Objeto;
use App\Objeto\Domain\ObjetoRepository;
use App\Shared\Domain\Criteria\Criteria;
use App\Shared\Domain\Criteria\Filter;
use App\Shared\Domain\Criteria\FilterOperator;
use App\Shared\Domain\Criteria\Filters;
use App\Shared\Domain\Criteria\Order;

class ObjetosHabilitadosFinder
{
    public function __construct(private ObjetoRepository $repository)
    {
    }

    public function finder()
    {
        $filterEstado = Filter::fromValues([
            'field' => 'estado',
            'operator' => FilterOperator::EQUAL,
            'value' => Objeto::ESTADO_PENDIENTE
        ]);

        $criteria = new Criteria(new Filters([$filterEstado]), Order::none(), null, null);

        return $this->repository->searchByCriteria($criteria);
    }
}