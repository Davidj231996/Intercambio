<?php

namespace App\Controller\Objeto;

use App\CategoriaIntercambio\Application\AddCategorias\AddCategoriasObjetoIntercambio;
use App\CategoriaObjeto\Application\AddCategorias\AddCategoriasObjeto;
use App\Form\Objeto\ObjetoCreateType;
use App\Imagen\Application\ObjetoCreate\ImagenObjetoCreate;
use App\Objeto\Application\Create\ObjetoCreate;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ObjetoCreateController extends AbstractController
{
    public function __construct(
        private ObjetoCreate        $objetoCreate,
        private AddCategoriasObjeto $addCategoriasObjeto,
        private ImagenObjetoCreate  $imagenObjetoCreate,
        private AddCategoriasObjetoIntercambio $addCategoriasObjetoIntercambio
    )
    {
    }

    /**
     * @Route("/objetoCreate", name="objeto_create")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function create(Request $request): RedirectResponse|Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        $form = $this->createForm(ObjetoCreateType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            try {
                $objeto = $this->objetoCreate->create($data['nombre'], $data['descripcion'], $this->getUser());
                if (isset($data['imagen'])) {
                    foreach ($data['imagen'] as $imagen) {
                        $this->imagenObjetoCreate->create($imagen, $objeto);
                    }
                }
                $this->addCategoriasObjeto->addCategoriasObjeto($data['categorias'], $objeto);

                $this->addCategoriasObjetoIntercambio->addCategoriasObjetoIntercambio($data['categoriasIntercambio'], $objeto);
                $this->addFlash(
                    'success',
                    'Objeto creado'
                );
                return $this->redirectToRoute('objeto', ['objetoId' => $objeto->id()]);
            } catch (Exception) {
                $this->addFlash(
                    'warning',
                    'Error al crear el objeto'
                );
            }
        }
        return $this->renderForm('objeto/create.html.twig', [
            'form' => $form
        ]);
    }
}