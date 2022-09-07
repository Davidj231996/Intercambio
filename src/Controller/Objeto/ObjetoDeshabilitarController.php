<?php

namespace App\Controller\Objeto;

use App\Objeto\Application\Deshabilitar\ObjetoDeshabilitar;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ObjetoDeshabilitarController extends AbstractController
{
    public function __construct(private ObjetoDeshabilitar $deshabilitar)
    {
    }

    /**
     * @Route("/objetoDeshabilitar/{objetoId}", name="objeto_deshabilitar")
     * @param $objetoId
     * @return Response
     */
    public function usuarioDeshabilitar($objetoId): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        try {
            $this->deshabilitar->deshabilitar($objetoId);
            $this->addFlash(
                'success',
                'Objeto deshabilitado'
            );
        } catch (Exception) {
            $this->addFlash(
                'warning',
                'Error al deshabilitar el objeto'
            );
        }
        return $this->redirectToRoute('perfil_admin');
    }
}