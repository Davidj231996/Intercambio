<?php

namespace App\Controller\Direccion;

use App\Direccion\Application\Update\DireccionUpdate;
use App\Form\Direccion\DireccionUpdateType;
use App\Form\Usuario\UsuarioUpdateType;
use App\Usuario\Application\Update\UsuarioUpdate;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DireccionUpdateController extends AbstractController
{
    public function __construct(private DireccionUpdate $update)
    {}

    /**
     * @Route("/direccionUpdate", name="direccion_update")
     * @param Request $request
     * @return Response
     */
    public function direccionUpdate(Request $request): Response
    {
        $form = $this->createForm(DireccionUpdateType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->update->update($this->getUser()->direccion(), $data['direccion'], $data['ciudad'], $data['provincia'], $data['comunidadAutonoma'], $data['codigoPostal']);
        }
        return $this->redirectToRoute('perfil');
    }
}