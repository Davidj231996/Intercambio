<?php

namespace App\Controller\Objeto;

use App\CategoriaObjeto\Application\AddCategorias\AddCategoriasObjeto;
use App\CategoriaObjeto\Application\UpdateCategorias\UpdateCategoriasObjeto;
use App\CategoriaObjeto\Domain\CategoriaObjeto;
use App\Form\Objeto\ObjetoUpdateType;
use App\Imagen\Application\ObjetoCreate\ImagenObjetoCreate;
use App\Objeto\Application\Update\ObjetoUpdate;
use App\Objeto\Domain\ObjetoFinder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ObjetoUpdateController extends AbstractController
{
    public function __construct(
        private ObjetoFinder        $objetoFinder,
        private ObjetoUpdate        $objetoUpdate,
        private UpdateCategoriasObjeto $updateCategoriasObjeto
    )
    {
    }

    /**
     * @Route("/objetoEdit/{objetoId}", name="objeto_edit")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function create(Request $request, int $objetoId): RedirectResponse|Response
    {
        $objeto = $this->objetoFinder->__invoke($objetoId);
        $categorias = [];
        /** @var CategoriaObjeto $categoriaObjeto */
        foreach ($objeto->categorias() as $categoriaObjeto) {
            $categorias[] = $categoriaObjeto->categoria();
        }
        $form = $this->createForm(ObjetoUpdateType::class, [
            'nombre' => $objeto->nombre(),
            'descripcion' => $objeto->descripcion(),
            'categorias' => $categorias
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->objetoUpdate->update($objetoId, $data['nombre'], $data['descripcion'], 0);
            $this->updateCategoriasObjeto->updateCategoriasObjeto($data['categorias'], $objeto);
            return $this->redirectToRoute('objeto', ['objetoId' => $objeto->id()]);
        }
        return $this->renderForm('objeto/create.html.twig', [
            'form' => $form
        ]);
    }
}