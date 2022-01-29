<?php

namespace App\Usuario\Application\UsuarioLoginFinder;

use App\Shared\Domain\Criteria\Criteria;
use App\Shared\Domain\Criteria\Filter;
use App\Shared\Domain\Criteria\FilterOperator;
use App\Shared\Domain\Criteria\Filters;
use App\Shared\Domain\Criteria\Order;
use App\Usuario\Domain\UsuarioRepository;

class UsuarioLoginFinder
{
    public function __construct(private UsuarioRepository $repository)
    {
    }

    public function finder(string $alias, string $password)
    {
        $filterAlias = Filter::fromValues([
            'field' => 'alias',
            'operator' => FilterOperator::EQUAL,
            'value' => $alias
        ]);
        $filterPassword = Filter::fromValues([
            'field' => 'password',
            'operator' => FilterOperator::EQUAL,
            'value' => $password
        ]);

        $criteria = new Criteria(new Filters([$filterAlias, $filterPassword]), Order::none(), null, null);

        return $this->repository->searchByCriteria($criteria);
    }
}