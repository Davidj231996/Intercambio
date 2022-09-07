<?php

namespace App\Controller\Intercambio;

use App\Intercambio\Application\Cancelar\IntercambioCancelar;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class IntercambioCancelarController extends AbstractController
{
    public function __construct(private IntercambioCancelar $intercambioCancelar)
    {}

    /**
     * @Route("intercambiocancelar/{intercambioId}", name="intercambio_cancelar")
     * @param $intercambioId
     * @return RedirectResponse
     */
    public function cancelar($intercambioId)
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        try {
            $this->intercambioCancelar->cancelar($intercambioId);
            $this->addFlash(
                'success',
                'Intercambio cancelado'
            );
        } catch (Exception) {
            $this->addFlash(
                'warning',
                'Error al cancelar el intercambio'
            );
        }
        return $this->redirectToRoute('perfil');
    }
}