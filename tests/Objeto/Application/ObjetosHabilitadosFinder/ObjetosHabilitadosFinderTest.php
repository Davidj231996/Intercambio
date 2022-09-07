<?php

namespace App\Tests\Objeto\Application\ObjetosHabilitadosFinder;

use App\Objeto\Application\ObjetosHabilitadosFinder\ObjetosHabilitadosFinder;
use App\Objeto\Domain\Objeto;
use App\Objeto\Domain\Objetos;
use App\Shared\Domain\Criteria\Criteria;
use App\Shared\Domain\Criteria\Filter;
use App\Shared\Domain\Criteria\FilterOperator;
use App\Shared\Domain\Criteria\Filters;
use App\Shared\Domain\Criteria\Order;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Objeto\ObjetoModuleUnitCase;

class ObjetosHabilitadosFinderTest extends ObjetoModuleUnitCase
{
    private ObjetosHabilitadosFinder $finder;

    protected function setUp(): void
    {
        parent::setUp();

        $this->finder = new ObjetosHabilitadosFinder($this->repository());
    }

    /** @test */
    public function devuelve_objetos_habilitados()
    {
        $objeto = ObjetoMother::create(estado: Objeto::ESTADO_PENDIENTE);
        $objetos = new Objetos([$objeto]);
        $filterEstado = Filter::fromValues([
            'field' => 'estado',
            'operator' => FilterOperator::EQUAL,
            'value' => Objeto::ESTADO_PENDIENTE
        ]);

        $criteria = new Criteria(new Filters([$filterEstado]), Order::none(), null, null);

        $this->shouldSave($objeto);

        $this->repository()->save($objeto);

        $this->shouldSearchByCriteria($criteria, $objetos);

        $this->finder->finder();
    }
}