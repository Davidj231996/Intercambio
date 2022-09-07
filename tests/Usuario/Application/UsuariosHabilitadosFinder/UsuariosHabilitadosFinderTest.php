<?php

namespace App\Tests\Usuario\Application\UsuariosHabilitadosFinder;

use App\Chat\Domain\Chat;
use App\Shared\Domain\Criteria\Criteria;
use App\Shared\Domain\Criteria\Filter;
use App\Shared\Domain\Criteria\FilterOperator;
use App\Shared\Domain\Criteria\Filters;
use App\Shared\Domain\Criteria\Order;
use App\Tests\Chat\Domain\ChatMother;
use App\Tests\Usuario\Domain\UsuarioMother;
use App\Tests\Usuario\UsuarioModuleUnitCase;
use App\Usuario\Application\ChatLeido\UsuarioChatLeido;
use App\Usuario\Application\UsuariosDeshabilitadosFinder\UsuariosDeshabilitadosFinder;
use App\Usuario\Application\UsuariosHabilitadosFinder\UsuariosHabilitadosFinder;
use App\Usuario\Domain\Usuario;
use App\Usuario\Domain\Usuarios;

class UsuariosHabilitadosFinderTest extends UsuarioModuleUnitCase
{

    private UsuariosHabilitadosFinder $finder;

    public function setUp(): void
    {
        parent::setUp();

        $this->finder = new UsuariosHabilitadosFinder($this->repository());
    }

    /** @test */
    public function debe_devolver_usuarios_habilitados()
    {
        $usuario = UsuarioMother::create(estado: Usuario::USUARIO_ACTIVO);
        $usuarios = new Usuarios([$usuario]);

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

        $this->shouldSearchByCriteria($criteria, $usuarios);

        $this->finder->finder();
    }
}