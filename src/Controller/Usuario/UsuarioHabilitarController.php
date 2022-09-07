<?php

namespace App\Controller\Usuario;

use App\Usuario\Application\Habilitar\UsuarioHabilitar;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsuarioHabilitarController extends AbstractController
{
    public function __construct(private UsuarioHabilitar $habilitar)
    {
    }

    /**
     * @Route("/usuarioHabilitar/{usuarioId}", name="usuario_habilitar")
     * @param $usuarioId
     * @return Response
     */
    public function usuarioHabilitar($usuarioId): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        try {
            $this->habilitar->habilitar($usuarioId);
            $this->addFlash(
                'success',
                'Usuario habilitado'
            );
        } catch (Exception) {
            $this->addFlash(
                'warning',
                'Error al habilitar el usuario'
            );
        }
        return $this->redirectToRoute('perfil_admin');
    }
}