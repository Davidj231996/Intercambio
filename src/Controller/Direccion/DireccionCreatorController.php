<?php

namespace App\Controller\Direccion;

use App\Direccion\Application\Create\DireccionCreate;
use App\Form\Direccion\DireccionType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DireccionCreatorController extends AbstractController
{
    public function __construct(private DireccionCreate $creator)
    {}

    /**
     * @Route("/direccionCreator", name="direccion_creator")
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function direccionCreator(Request $request): RedirectResponse|Response
    {
        $form = $this->createForm(DireccionType::class, [
            'usuario' => $request->get('usuarioId')
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $direccion = $this->creator->create($data['direccion'], $data['ciudad'], $data['provincia'], $data['comunidadAutonoma'], $data['codigoPostal'], $data['usuario']);
            return $this->redirectToRoute('usuario', ['usuarioId' => $direccion->usuario()->id()]);
        }
        return $this->renderForm('direccion/create.html.twig', [
            'form' => $form
        ]);
    }
}