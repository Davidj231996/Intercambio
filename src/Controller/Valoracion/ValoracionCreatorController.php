<?php

namespace App\Controller\Valoracion;

use App\Valoracion\Application\Create\ValoracionCreate;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ValoracionCreatorController extends AbstractController
{
    public function __construct(private ValoracionCreate $creator)
    {}

    /**
     * @Route("/valoracionCreator/{valor}")
     * @param float $valor
     * @return Response
     */
    public function valoracionCreator(float $valor): Response
    {
        $this->creator->create($this->getUser(), $valor);
        return $this->render('index.html.twig');
    }
}