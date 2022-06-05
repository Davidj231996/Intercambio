<?php

namespace App\Controller\Direccion;

use App\Direccion\Application\Update\DireccionUpdate;
use App\Form\Direccion\DireccionUpdateType;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DireccionUpdateController extends AbstractController
{
    public function __construct(private DireccionUpdate $update)
    {
    }

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
            try {
                $this->update->update($this->getUser()->direccion(), $data['direccion'], $data['ciudad'], $data['provincia'], $data['comunidadAutonoma'], $data['codigoPostal']);
                $this->addFlash(
                    'success',
                    'Dirección actualizada'
                );
            } catch (Exception) {
                $this->update->update($this->getUser()->direccion(), $data['direccion'], $data['ciudad'], $data['provincia'], $data['comunidadAutonoma'], $data['codigoPostal']);
                $this->addFlash(
                    'warning',
                    'Error al actualizar la dirección'
                );
            }
        }
        return $this->redirectToRoute('perfil');
    }
}