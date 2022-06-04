<?php

namespace App\Controller\Preferencia;

use App\Preferencia\Application\Delete\PreferenciaDelete;
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
        $this->preferenciaDelete->delete($preferenciaId);

        return $this->redirectToRoute('perfil');
    }
}