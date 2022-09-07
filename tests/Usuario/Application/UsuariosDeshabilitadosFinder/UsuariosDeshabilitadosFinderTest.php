<?php

namespace App\Tests\Usuario\Application\UsuariosDeshabilitadosFinder;

use App\Shared\Domain\Criteria\Criteria;
use App\Shared\Domain\Criteria\Filter;
use App\Shared\Domain\Criteria\FilterOperator;
use App\Shared\Domain\Criteria\Filters;
use App\Shared\Domain\Criteria\Order;
use App\Tests\Usuario\Domain\UsuarioMother;
use App\Tests\Usuario\UsuarioModuleUnitCase;
use App\Usuario\Application\UsuariosDeshabilitadosFinder\UsuariosDeshabilitadosFinder;
use App\Usuario\Domain\Usuario;
use App\Usuario\Domain\Usuarios;

class UsuariosDeshabilitadosFinderTest extends UsuarioModuleUnitCase
{

    private UsuariosDeshabilitadosFinder $finder;

    public function setUp(): void
    {
        parent::setUp();

        $this->finder = new UsuariosDeshabilitadosFinder($this->repository());
    }

    /** @test */
    public function debe_devolver_usuarios_deshabilitados()
    {
        $usuario = UsuarioMother::new();
        $usuarios = new Usuarios([$usuario]);

        $filterEstado = Filter::fromValues([
            'field' => 'estado',
            'operator' => FilterOperator::EQUAL,
            'value' => Usuario::USUARIO_INACTIVO
        ]);

        $criteria = new Criteria(new Filters([$filterEstado]), Order::none(), null, null);

        $this->shouldSearchByCriteria($criteria, $usuarios);

        $this->finder->finder();
    }
}