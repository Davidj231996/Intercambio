<?php

namespace App\Controller\Objeto;

use App\Objeto\Application\Habilitar\ObjetoHabilitar;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ObjetoHabilitarController extends AbstractController
{
    public function __construct(private ObjetoHabilitar $habilitar)
    {
    }

    /**
     * @Route("/objetoHabilitar/{objetoId}", name="objeto_habilitar")
     * @param $objetoId
     * @return Response
     */
    public function usuarioHabilitar($objetoId): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        try {
            $this->habilitar->habilitar($objetoId);
            $this->addFlash(
                'success',
                'Objeto habilitado'
            );
        } catch (Exception) {
            $this->addFlash(
                'warning',
                'Error al habilitar el objeto'
            );
        }
        return $this->redirectToRoute('perfil_admin');
    }
}