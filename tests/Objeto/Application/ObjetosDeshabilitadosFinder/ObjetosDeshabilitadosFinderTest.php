<?php

namespace App\Tests\Objeto\Application\ObjetosDeshabilitadosFinder;

use App\Objeto\Application\ObjetosDeshabilitadosFinder\ObjetosDeshabilitadosFinder;
use App\Objeto\Domain\Objeto;
use App\Objeto\Domain\Objetos;
use App\Shared\Domain\Criteria\Criteria;
use App\Shared\Domain\Criteria\Filter;
use App\Shared\Domain\Criteria\FilterOperator;
use App\Shared\Domain\Criteria\Filters;
use App\Shared\Domain\Criteria\Order;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Objeto\ObjetoModuleUnitCase;

class ObjetosDeshabilitadosFinderTest extends ObjetoModuleUnitCase
{
    private ObjetosDeshabilitadosFinder $finder;

    protected function setUp(): void
    {
        parent::setUp();

        $this->finder = new ObjetosDeshabilitadosFinder($this->repository());
    }

    /** @test */
    public function devuelve_objetos_deshabilitados()
    {
        $objeto = ObjetoMother::new();
        $objetos = new Objetos([$objeto]);
        $filterEstado = Filter::fromValues([
            'field' => 'estado',
            'operator' => FilterOperator::EQUAL,
            'value' => Objeto::ESTADO_DESHABILITADO
        ]);

        $criteria = new Criteria(new Filters([$filterEstado]), Order::none(), null, null);

        $this->shouldSave($objeto);

        $this->repository()->save($objeto);

        $this->shouldSearchByCriteria($criteria, $objetos);

        $this->finder->finder();
    }
}