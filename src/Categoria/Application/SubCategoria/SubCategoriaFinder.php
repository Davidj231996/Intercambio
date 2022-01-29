<?php

namespace App\Categoria\Application\SubCategoria;

use App\Categoria\Domain\CategoriaRepository;
use App\Categoria\Domain\Categorias;
use App\Shared\Domain\Criteria\Criteria;
use App\Shared\Domain\Criteria\Filter;
use App\Shared\Domain\Criteria\FilterOperator;
use App\Shared\Domain\Criteria\Filters;
use App\Shared\Domain\Criteria\Order;
use App\Shared\Domain\Criteria\OrderType;

class SubCategoriaFinder
{
    public function __construct(private CategoriaRepository $repository)
    {}

    public function __invoke(int $categoriaId): Categorias
    {
        $filter = Filter::fromValues([
            'field' => 'categoriaId',
            'operator' => FilterOperator::EQUAL,
            'value' => $categoriaId
        ]);
        $order = Order::fromValues('nombre', OrderType::DESC);

        $criteria = new Criteria(new Filters([$filter]), $order, null, null);

        return $this->repository->searchByCriteria($criteria);
    }
}