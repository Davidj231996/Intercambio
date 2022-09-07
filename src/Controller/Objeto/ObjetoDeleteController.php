<?php

namespace App\Controller\Objeto;

use App\Objeto\Application\Delete\ObjetoDelete;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class ObjetoDeleteController extends AbstractController
{

    public function __construct(private ObjetoDelete $objetoDelete)
    {}

    /**
     * @Route("/deleteObjeto/{objetoId}", name="objeto_delete")
     * @param int $objetoId
     * @return RedirectResponse
     */
    public function delete(int $objetoId): RedirectResponse
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        try {
            $this->objetoDelete->delete($objetoId);
            $this->addFlash(
                'success',
                'Objeto borrado'
            );
        } catch (Exception) {
            $this->addFlash(
                'warning',
                'Error al borrar el objeto'
            );
        }
        return $this->redirectToRoute('perfil');
    }
}