<?php

namespace App\Tests\Objeto\Application\Create;

use App\Objeto\Application\Create\ObjetoCreate;
use App\Objeto\Domain\Objeto;
use App\Tests\Objeto\ObjetoModuleUnitCase;
use App\Usuario\Domain\Usuario;

final class ObjetoCreateTest extends ObjetoModuleUnitCase
{
    private ObjetoCreate|null $creator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->creator = new ObjetoCreate($this->repository());
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
        $this->creator->create($nombre, $descripcion, $estado, $usuario);

        print("Objeto creado");
    }
}