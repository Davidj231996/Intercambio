<?php

namespace App\Controller\Usuario;

use App\Usuario\Application\Deshabilitar\UsuarioDeshabilitar;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsuarioDeshabilitarController extends AbstractController
{
    public function __construct(private UsuarioDeshabilitar $deshabilitar)
    {
    }

    /**
     * @Route("/usuarioDeshabilitar/{usuarioId}", name="usuario_deshabilitar")
     * @param $usuarioId
     * @return Response
     */
    public function usuarioDeshabilitar($usuarioId): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        try {
            $this->deshabilitar->deshabilitar($usuarioId);
            $this->addFlash(
                'success',
                'Usuario deshabilitado'
            );
        } catch (Exception) {
            $this->addFlash(
                'warning',
                'Error al deshabilitar el usuario'
            );
        }
        return $this->redirectToRoute('perfil_admin');
    }
}