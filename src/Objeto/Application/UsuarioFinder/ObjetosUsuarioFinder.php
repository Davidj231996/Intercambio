<?php

namespace App\Objeto\Application\UsuarioFinder;

use App\Objeto\Domain\ObjetoNotFound;
use App\Objeto\Domain\ObjetoRepository;
use App\Objeto\Domain\Objetos;
use App\Shared\Domain\Criteria\Criteria;
use App\Shared\Domain\Criteria\Filter;
use App\Shared\Domain\Criteria\FilterOperator;
use App\Shared\Domain\Criteria\Filters;
use App\Shared\Domain\Criteria\Order;

class ObjetosUsuarioFinder
{
    public function __construct(private ObjetoRepository $repository)
    {
    }

    public function __invoke(int $id): Objetos
    {
        $filter = Filter::fromValues([
            'field' => 'usuarioId',
            'operator' => FilterOperator::EQUAL,
            'value' => $id
        ]);

        $criteria = new Criteria(new Filters([$filter]), Order::none(), null, null);

        return $this->repository->searchByCriteria($criteria);
    }
}