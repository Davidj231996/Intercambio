<?php

namespace App\Tests\Objeto\Application\Update;

use App\Objeto\Application\Update\ObjetoUpdate;
use App\Objeto\Domain\Objeto;
use App\Tests\Objeto\ObjetoModuleUnitCase;
use App\Usuario\Domain\Usuario;

final class ObjetoUpdateTest extends ObjetoModuleUnitCase
{
    private ObjetoUpdate|null $creator;

    protected function setUp(): void
    {
        parent::setUp();

        $this->creator = new ObjetoUpdate($this->repository());
    }

    public function testUpdateObjeto()
    {
        $id = 1;
        $nombre = 'Pantalón';
        $descripcion = 'Unos pantalones muy bonitos';
        $estado = 0;



        $usuario = Usuario::create(1, '', '', '', '', '', '');
        $objeto = Objeto::create($id, $nombre, $descripcion, $estado, $usuario);
        $objeto->update('Pantalon', $descripcion, $estado);
        $this->shouldSave($objeto);
        $this->creator->update($id, 'Pantalon', $descripcion, $estado);

        print("Objeto creado");
    }
}