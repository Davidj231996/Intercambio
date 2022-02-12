<?php

namespace App\Controller\Valoracion;

use App\Valoracion\Application\Create\ValoracionCreator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ValoracionCreatorController extends AbstractController
{
    public function __construct(private ValoracionCreator $creator)
    {}

    /**
     * @Route("/valoracionCreator/{usuarioId}/{valor}")
     * @param int $valoracionId
     * @param int $usuarioId
     * @param float $valor
     * @return Response
     */
    public function valoracionCreator(int $usuarioId, float $valor): Response
    {
        $this->creator->create($usuarioId, $valor);
        return $this->render('index.html.twig');
    }
}