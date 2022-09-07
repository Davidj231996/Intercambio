<?php

namespace App\Usuario\Application\UsuariosHabilitadosFinder;

use App\Shared\Domain\Criteria\Criteria;
use App\Shared\Domain\Criteria\Filter;
use App\Shared\Domain\Criteria\FilterOperator;
use App\Shared\Domain\Criteria\Filters;
use App\Shared\Domain\Criteria\Order;
use App\Usuario\Domain\Usuario;
use App\Usuario\Domain\UsuarioRepository;

class UsuariosHabilitadosFinder
{
    public function __construct(private UsuarioRepository $repository)
    {
    }

    public function finder()
    {
        $filterEstado = Filter::fromValues([
            'field' => 'estado',
            'operator' => FilterOperator::EQUAL,
            'value' => Usuario::USUARIO_ACTIVO
        ]);

        $filterAdmin = Filter::fromValues([
            'field' => 'alias',
            'operator' => FilterOperator::NOT_EQUAL,
            'value' => Usuario::USUARIO_ADMIN
        ]);

        $criteria = new Criteria(new Filters([$filterEstado, $filterAdmin]), Order::none(), null, null);

        return $this->repository->searchByCriteria($criteria);
    }
}