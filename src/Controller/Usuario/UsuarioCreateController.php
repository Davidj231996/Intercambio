<?php

namespace App\Controller\Usuario;

use App\Form\Usuario\UsuarioType;
use App\Usuario\Application\Create\UsuarioCreator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsuarioCreateController extends AbstractController
{
    public function __construct(private UsuarioCreator $creator)
    {
    }

    /**
     * @Route("/usuarioCreate")
     * @param Request $request
     * @return Response
     */
    public function usuarioCreate(Request $request): Response
    {
        $form = $this->createForm(UsuarioType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $usuario = $this->creator->create($request->get('usuario'));
            return $this->redirectToRoute('direccion_creator', ['usuarioId' => $usuario->id()]);
        }
        return $this->renderForm('usuario/create.html.twig', [
            'form' => $form
        ]);
    }
}