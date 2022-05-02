<?php

namespace App\Tests\Usuario\Application\UsuarioLoginFinder;

use App\Shared\Domain\Criteria\FilterOperator;
use App\Tests\Shared\Domain\Criteria\CriteriaMother;
use App\Tests\Shared\Domain\Criteria\FilterMother;
use App\Tests\Shared\Domain\Criteria\FiltersMother;
use App\Tests\Usuario\Domain\UsuarioMother;
use App\Tests\Usuario\UsuarioModuleUnitCase;
use App\Usuario\Application\UsuarioLoginFinder\UsuarioLoginFinder;
use App\Usuario\Domain\Usuarios;

class UsuarioLoginFinderTest extends UsuarioModuleUnitCase
{
    private UsuarioLoginFinder $finder;

    public function setUp(): void
    {
        parent::setUp();

        $this->finder = new UsuarioLoginFinder($this->repository());
    }

    /** @test */
    public function comprobacion_correcta()
    {
        $usuario = UsuarioMother::create();

        $filterAlias = FilterMother::fromValues([
            'field' => 'alias',
            'operator' => FilterOperator::EQUAL,
            'value' => $usuario->alias()
        ]);
        $filterPassword = FilterMother::fromValues([
            'field' => 'password',
            'operator' => FilterOperator::EQUAL,
            'value' => $usuario->password()
        ]);

        $criteria = CriteriaMother::create(FiltersMother::create([$filterAlias, $filterPassword]));

        $this->shouldSearchByCriteria($criteria, new Usuarios([$usuario]));

        $this->finder->finder($usuario->alias(), $usuario->password());
    }
}