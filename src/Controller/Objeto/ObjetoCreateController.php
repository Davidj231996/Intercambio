<?php

namespace App\Controller\Objeto;

use App\Categoria\Domain\CategoriasFinder;
use App\Form\Objeto\ObjetoCreateType;
use App\Objeto\Application\Create\ObjetoCreate;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ObjetoCreateController extends AbstractController
{
    public function __construct(private ObjetoCreate $objetoCreate, private CategoriasFinder $finder)
    {
    }

    /**
     * @Route("/objetoCreate", name="objeto_create")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function create(Request $request)
    {
        $categorias = $this->finder->__invoke();
        $form = $this->createForm(ObjetoCreateType::class, null, [
            'categorias' => $categorias
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $objeto = $this->objetoCreate->create($request->get('objeto'), $this->getUser());
            return $this->redirectToRoute('objeto', ['objetoId' => $objeto->id()]);
        }
        return $this->renderForm('objeto/create.html.twig', [
            'form' => $form
        ]);
    }
}