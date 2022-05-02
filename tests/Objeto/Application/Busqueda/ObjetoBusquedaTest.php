<?php

namespace App\Tests\Objeto\Application\Busqueda;

use App\Objeto\Application\Busqueda\ObjetosBusqueda;
use App\Objeto\Domain\Objetos;
use App\Shared\Domain\Criteria\FilterOperator;
use App\Shared\Domain\Criteria\FilterValue;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Objeto\Domain\ObjetosMother;
use App\Tests\Objeto\ObjetoModuleUnitCase;
use App\Tests\Shared\Domain\Criteria\CriteriaMother;
use App\Tests\Shared\Domain\Criteria\FilterMother;
use App\Tests\Shared\Domain\Criteria\FiltersMother;
use App\Tests\Shared\Domain\Criteria\OrderMother;
use App\Tests\Shared\Domain\DuplicatorMother;
use App\Tests\Shared\Domain\WordMother;

class ObjetoBusquedaTest extends ObjetoModuleUnitCase
{
    private ObjetosBusqueda $busqueda;

    public function setUp(): void
    {
        parent::setUp();

        $this->busqueda = new ObjetosBusqueda($this->repository());
    }

    /** @test */
    public function obtiene_objetos_de_busqueda()
    {
        $objeto1 = ObjetoMother::create();
        $objeto2 = DuplicatorMother::with($objeto1, ['descripcion' => 'objeto2']);

        $objetos = ObjetosMother::create([$objeto1, $objeto2]);

        $filter = FilterMother::fromValues([
            'field' => 'nombre',
            'operator' => FilterOperator::CONTAINS,
            'value' => $objeto1->nombre()
        ]);

        $criteria = CriteriaMother::create(FiltersMother::create([$filter]), OrderMother::none());

        $this->shouldSearchByCriteria($criteria, $objetos);

        $this->repository()->searchByCriteria($criteria);
    }

    /** @test */
    public function no_encuentra_ningun_objeto()
    {
        $objetos = ObjetosMother::create([]);

        $filter = FilterMother::fromValues([
            'field' => 'nombre',
            'operator' => FilterOperator::CONTAINS,
            'value' => WordMother::create()
        ]);

        $criteria = CriteriaMother::create(FiltersMother::create([$filter]), OrderMother::none());

        $this->shouldSearchByCriteria($criteria, $objetos);

        $this->repository()->searchByCriteria($criteria);
    }
}