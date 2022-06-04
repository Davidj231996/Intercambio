<?php

namespace App\Controller\Favorito;

use App\Favorito\Application\Create\FavoritoCreate;
use App\Objeto\Domain\ObjetoFinder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class FavoritoCreateController extends AbstractController
{
    public function __construct(private FavoritoCreate $favoritoCreate, private ObjetoFinder $objetoFinder)
    {
    }

    /**
     * @Route("/favoritocreate/{objetoId}", name="favorito_create")
     * @param $objetoId
     * @return RedirectResponse
     */
    public function create($objetoId): RedirectResponse
    {
        $objeto = $this->objetoFinder->__invoke($objetoId);

        $this->favoritoCreate->create($this->getUser(), $objeto);

        return $this->redirectToRoute('objeto', [
            'objetoId' => $objetoId
        ]);
    }
}