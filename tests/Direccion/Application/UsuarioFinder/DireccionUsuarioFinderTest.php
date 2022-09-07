<?php

namespace App\Tests\Direccion\Application\UsuarioFinder;

use App\Direccion\Application\UsuarioFinder\DireccionUsuarioFinder;
use App\Tests\Direccion\DireccionModuleUnitCase;
use App\Tests\Direccion\Domain\DireccionMother;

class DireccionUsuarioFinderTest extends DireccionModuleUnitCase
{
    private DireccionUsuarioFinder $finder;

    protected function setUp(): void
    {
        parent::setUp();

        $this->finder = new DireccionUsuarioFinder($this->repository());
    }

    /** @test */
    public function debe_buscar_direccion_usuario()
    {
        $direccion = DireccionMother::create();

        $this->shouldSearchByUsuario($direccion->usuario(), $direccion);

        $this->finder->__invoke($direccion->usuario());
    }
}