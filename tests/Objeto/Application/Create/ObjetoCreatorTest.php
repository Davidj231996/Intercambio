<?php

namespace App\Tests\Objeto\Application\Create;

use App\Objeto\Application\Create\ObjetoCreator;
use App\Objeto\Domain\Objeto;
use App\Tests\Objeto\ObjetoModuleUnitCase;
use App\Usuario\Domain\Usuario;

final class ObjetoCreatorTest extends ObjetoModuleUnitCase
{
    private ObjetoCreator|null $creator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->creator = new ObjetoCreator($this->repository());
    }

    public function testCrearObjeto()
    {
        $id = 1;
        $nombre = 'Pantalón';
        $descripcion = 'Unos pantalones muy bonitos';
        $estado = 0;

        $usuario = Usuario::create(1, '', '', '', '', '', '');
        $objeto = Objeto::create($id, $nombre, $descripcion, $estado, $usuario);
        $this->shouldSave($objeto);
        $this->creator->create($id, $nombre, $descripcion, $estado, $usuario);

        print("Objeto creado");
    }
}