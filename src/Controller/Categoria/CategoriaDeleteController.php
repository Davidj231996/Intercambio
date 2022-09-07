<?php

namespace App\Controller\Categoria;

use App\Categoria\Application\Delete\CategoriaDelete;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class CategoriaDeleteController extends AbstractController
{
    public function __construct(private CategoriaDelete $categoriaDelete)
    {}

    /**
     * @Route("/categoriaDelete/{categoriaId}", name="categoria_delete")
     * @param int $categoriaId
     * @return RedirectResponse
     */
    public function delete(int $categoriaId)
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        try {
            $this->categoriaDelete->delete($categoriaId);
            $this->addFlash(
                'success',
                'Categoría borrada'
            );
        } catch (Exception) {
            $this->addFlash(
                'warning',
                'Error al borrar la categoría'
            );
        }
        return $this->redirectToRoute('perfil_admin');
    }
}