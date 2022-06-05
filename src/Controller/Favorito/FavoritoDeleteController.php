<?php

namespace App\Controller\Favorito;

use App\Favorito\Application\Delete\FavoritoDelete;
use App\Objeto\Domain\ObjetoFinder;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class FavoritoDeleteController extends AbstractController
{
    public function __construct(private FavoritoDelete $favoritoDelete, private ObjetoFinder $objetoFinder)
    {
    }

    /**
     * @Route("/favoritodelete/{favoritoId}", name="favorito_delete")
     * @param $favoritoId
     * @return RedirectResponse
     */
    public function create($favoritoId): RedirectResponse
    {
        try {
            $this->favoritoDelete->delete($favoritoId);
            $this->addFlash(
                'success',
                'Favorito eliminado'
            );
        } catch (Exception) {
            $this->addFlash(
                'warning',
                'Error al eliminar el favorito'
            );
        }

        return $this->redirectToRoute('perfil');
    }
}