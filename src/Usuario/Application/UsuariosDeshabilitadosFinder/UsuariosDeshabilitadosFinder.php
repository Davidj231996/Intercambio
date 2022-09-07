<?php

namespace App\Usuario\Application\UsuariosDeshabilitadosFinder;

use App\Shared\Domain\Criteria\Criteria;
use App\Shared\Domain\Criteria\Filter;
use App\Shared\Domain\Criteria\FilterOperator;
use App\Shared\Domain\Criteria\Filters;
use App\Shared\Domain\Criteria\Order;
use App\Usuario\Domain\Usuario;
use App\Usuario\Domain\UsuarioRepository;

class UsuariosDeshabilitadosFinder
{
    public function __construct(private UsuarioRepository $repository)
    {
    }

    public function finder()
    {
        $filterEstado = Filter::fromValues([
            'field' => 'estado',
            'operator' => FilterOperator::EQUAL,
            'value' => Usuario::USUARIO_INACTIVO
        ]);

        $criteria = new Criteria(new Filters([$filterEstado]), Order::none(), null, null);

        return $this->repository->searchByCriteria($criteria);
    }
}