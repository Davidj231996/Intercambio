<?php

namespace App\Tests\LogObjeto\Application\TodayFinder;

use App\LogObjeto\Application\TodayFinder\LogObjetoTodayFinder;
use App\LogObjeto\Domain\LogObjeto;
use App\Tests\LogObjeto\Domain\LogObjetoMother;
use App\Tests\LogObjeto\LogObjetoModuleUnitCase;
use DateTime;

class LogObjetoTodayFinderTest extends LogObjetoModuleUnitCase
{
    private LogObjetoTodayFinder $finder;

    protected function setUp(): void
    {
        parent::setUp();

        $this->finder = new LogObjetoTodayFinder($this->repository());
    }

    /** @test */
    public function devuelve_log_objetos_hoy()
    {
        $log = LogObjetoMother::create(fecha: new DateTime(), estado: LogObjeto::TIPO_CREAR);
        $log2 = LogObjetoMother::create(fecha: new DateTime(), estado: LogObjeto::TIPO_ELIMINAR);

        $this->shouldSave($log);

        $this->repository()->save($log);

        $this->shouldSave($log2);

        $this->repository()->save($log2);

        $logsDevolucion = [
            [
                'tipo' => LogObjeto::TIPO_CREAR,
                'cantidad' => 1
            ],
            [
                'tipo' => LogObjeto::TIPO_EDITAR,
                'cantidad' => 0
            ],
            [
                'tipo' => LogObjeto::TIPO_ELIMINAR,
                'cantidad' => 1
            ], [
                'tipo' => LogObjeto::TIPO_HABILITAR,
                'cantidad' => 0
            ], [
                'tipo' => LogObjeto::TIPO_DESHABILITAR,
                'cantidad' => 0
            ]
        ];

        $this->shouldSearchToday(new DateTime(), $logsDevolucion);

        $this->finder->__invoke();
    }
}