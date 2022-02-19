<?php

namespace App\Controller\Objeto;

use App\Objeto\Application\Busqueda\ObjetosBusqueda;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ObjetosBusquedaController extends AbstractController
{
    public function __construct(private ObjetosBusqueda $objetosBusqueda)
    {}

    /**
     * @Route("/busqueda", name="busqueda")
     * @param Request $request
     * @return Response
     */
    public function busqueda(Request $request)
    {
        $objetos = $this->objetosBusqueda->busqueda($request->get('busqueda'));

        return $this->render('objeto/objetos.html.twig', [
            'objetos' => $objetos
        ]);
    }
}