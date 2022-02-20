<?php

namespace App\Controller\Objeto;

use App\Categoria\Domain\CategoriasFinder;
use App\CategoriaObjeto\Application\AddCategorias\AddCategoriasObjeto;
use App\Form\Objeto\ObjetoCreateType;
use App\Imagen\Application\ObjetoCreate\ImagenObjetoCreate;
use App\Objeto\Application\Create\ObjetoCreate;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ObjetoCreateController extends AbstractController
{
    public function __construct(
        private ObjetoCreate $objetoCreate,
        private CategoriasFinder $finder,
        private AddCategoriasObjeto $addCategoriasObjeto,
        private ImagenObjetoCreate $imagenObjetoCreate
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
        $categorias = $this->finder->__invoke();
        $form = $this->createForm(ObjetoCreateType::class, null, [
            'categorias' => $categorias
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $objeto = $this->objetoCreate->create($data['nombre'], $data['descripcion'], $this->getUser());
            if (isset($data['imagen'])) {
                $this->imagenObjetoCreate->create($data['imagen'], $objeto);
            }
            $this->addCategoriasObjeto->addCategoriasObjeto($data['categorias'], $objeto);
            return $this->redirectToRoute('objeto', ['objetoId' => $objeto->id()]);
        }
        return $this->renderForm('objeto/create.html.twig', [
            'form' => $form
        ]);
    }
}