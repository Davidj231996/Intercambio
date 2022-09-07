<?php

namespace App\Tests\Objeto\Application\ObjetosHabilitadosUsuarioFinder;

use App\Objeto\Application\ObjetosHabilitadosUsuarioFinder\ObjetosHabilitadosUsuarioFinder;
use App\Objeto\Domain\Objeto;
use App\Objeto\Domain\Objetos;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Objeto\ObjetoModuleUnitCase;
use App\Tests\Usuario\Domain\UsuarioMother;

class ObjetosHabilitadosUsuarioFinderTest extends ObjetoModuleUnitCase
{
    private ObjetosHabilitadosUsuarioFinder $finder;

    protected function setUp(): void
    {
        parent::setUp();

        $this->finder = new ObjetosHabilitadosUsuarioFinder($this->repository());
    }

    /** @test */
    public function devuelve_objetos_habilitados()
    {
        $usuario = UsuarioMother::create();
        $objeto = ObjetoMother::create(estado: Objeto::ESTADO_PENDIENTE, usuario: $usuario);
        $objetos = new Objetos([$objeto]);

        $this->shouldSave($objeto);

        $this->repository()->save($objeto);

        $this->shouldSearchHabilitadosByUsuario($usuario, $objetos);

        $this->finder->finder($usuario);
    }
}