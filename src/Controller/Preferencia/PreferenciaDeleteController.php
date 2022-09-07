<?php

namespace App\Controller\Preferencia;

use App\Preferencia\Application\Delete\PreferenciaDelete;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class PreferenciaDeleteController extends AbstractController
{
    public function __construct(private PreferenciaDelete $preferenciaDelete) {}

    /**
     * @Route("/preferenciadelete/{preferenciaId}", name="preferencia_delete")
     * @param $preferenciaId
     * @return RedirectResponse
     */
    public function delete($preferenciaId): RedirectResponse
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        try {
            $this->preferenciaDelete->delete($preferenciaId);
            $this->addFlash(
                'success',
                'Preferencia eliminada'
            );
        } catch (Exception) {
            $this->addFlash(
                'warning',
                'Error al eliminar preferencia'
            );
        }

        return $this->redirectToRoute('perfil');
    }
}