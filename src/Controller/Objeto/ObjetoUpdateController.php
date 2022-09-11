<?php

namespace App\Controller\Objeto;

use App\CategoriaIntercambio\Application\UpdateCategorias\UpdateCategoriasObjetoIntercambio;
use App\CategoriaIntercambio\Domain\CategoriaIntercambio;
use App\CategoriaObjeto\Application\UpdateCategorias\UpdateCategoriasObjeto;
use App\CategoriaObjeto\Domain\CategoriaObjeto;
use App\Form\Objeto\ObjetoUpdateType;

use App\Objeto\Application\Update\ObjetoUpdate;
use App\Objeto\Domain\ObjetoFinder;
use Exception;
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
        private UpdateCategoriasObjeto $updateCategoriasObjeto,
        private UpdateCategoriasObjetoIntercambio $updateCategoriasObjetoIntercambio
    )
    {
    }

    /**
     * @Route("/objetoEdit/{objetoId}", name="objeto_edit")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function update(Request $request, int $objetoId): RedirectResponse|Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $objeto = $this->objetoFinder->__invoke($objetoId);
        $categorias = [];
        $categoriasIntercambio = [];
        /** @var CategoriaObjeto $categoriaObjeto */
        foreach ($objeto->categorias() as $categoriaObjeto) {
            $categorias[] = $categoriaObjeto->categoria();
        }
        /** @var CategoriaIntercambio $categoriaObjeto */
        foreach ($objeto->categoriasIntercambio() as $categoriaIntercambio) {
            $categoriasIntercambio[] = $categoriaIntercambio->categoria();
        }
        $form = $this->createForm(ObjetoUpdateType::class, [
            'nombre' => $objeto->nombre(),
            'descripcion' => $objeto->descripcion(),
            'categorias' => $categorias,
            'categoriasIntercambio' => $categoriasIntercambio
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            try {
                $this->objetoUpdate->update($objetoId, $data['nombre'], $data['descripcion']);
                $this->updateCategoriasObjeto->updateCategoriasObjeto($data['categorias'], $objeto);
                $this->updateCategoriasObjetoIntercambio->updateCategoriasObjetoIntercambio($data['categoriasIntercambio'], $objeto);
                $this->addFlash(
                    'success',
                    'Objeto modificado'
                );
                return $this->redirectToRoute('objeto', ['objetoId' => $objeto->id()]);
            } catch (Exception) {
                $this->addFlash(
                    'warning',
                    'Error al modificar el objeto'
                );
            }
        }
        return $this->renderForm('objeto/create.html.twig', [
            'form' => $form
        ]);
    }
}