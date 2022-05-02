<?php

namespace App\Tests\Objeto\Infrastructure\Persistence;

use App\Objeto\Domain\ObjetoRepository;
use App\Tests\Objeto\Domain\ObjetoMother;
use App\Tests\Objeto\ObjetoModuleInfraestructureTestCase;
use App\Tests\Shared\Domain\IdMother;
use App\Usuario\Domain\UsuarioRepository;

class ObjetoRepositoryTest extends ObjetoModuleInfraestructureTestCase
{
    /**
     * @test
     * @doesNotPerformAssertions
     */
    public function crea_objeto()
    {
        $objeto = ObjetoMother::new();

        $this->getContainer()->get(UsuarioRepository::class)->save($objeto->usuario());

        $this->repository()->save($objeto);
    }

    /** @test */
    public function devuelve_objeto_existente()
    {
        $objeto = ObjetoMother::new();

        $this->getContainer()->get(UsuarioRepository::class)->save($objeto->usuario());

        $this->repository()->save($objeto);

        self::assertEquals($this->repository()->search($objeto->id()), $objeto);
    }

    /** @test */
    public function no_devuele_objeto()
    {
        self::assertNull($this->repository()->search(IdMother::create()));
    }
}