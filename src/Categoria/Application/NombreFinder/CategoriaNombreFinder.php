<?php

namespace App\Categoria\Application\NombreFinder;

use App\Categoria\Domain\CategoriaRepository;
use App\Categoria\Domain\Categorias;
use App\Shared\Domain\Criteria\Criteria;
use App\Shared\Domain\Criteria\Filter;
use App\Shared\Domain\Criteria\FilterOperator;
use App\Shared\Domain\Criteria\Filters;
use App\Shared\Domain\Criteria\Order;

class CategoriaNombreFinder
{
    public function __construct(private CategoriaRepository $repository)
    {}

    public function __invoke(string $nombre): Categorias
    {
        $filter = Filter::fromValues([
            'field' => 'nombre',
            'operator' => FilterOperator::like(),
            'value' => $nombre
        ]);

        $criteria = new Criteria(new Filters([$filter]), Order::none(), null, null);

        return $this->repository->searchByCriteria($criteria);
    }
}