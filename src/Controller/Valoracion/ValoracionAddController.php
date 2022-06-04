<?php

namespace App\Controller\Valoracion;

use App\Form\Valoracion\ValoracionCreateType;
use App\Usuario\Domain\UsuarioFinder;
use App\Valoracion\Application\Add\ValoracionAdd;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ValoracionAddController extends AbstractController
{
    public function __construct(private ValoracionAdd $valoracionAdd, private UsuarioFinder $usuarioFinder)
    {
    }

    /**
     * @Route("/valoracionAdd/{usuarioId}", name="valoracion_add")
     * @param Request $request
     * @param $usuarioId
     * @return Response
     */
    public function add(Request $request, $usuarioId): Response
    {
        $form = $this->createForm(ValoracionCreateType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->valoracionAdd->add($this->usuarioFinder->__invoke($usuarioId), $data['valor']);
            return $this->redirectToRoute('usuario', [
                'usuarioId' => $usuarioId
            ]);
        }
        return $this->renderForm('valoracion/add.html.twig', [
            'form' => $form
        ]);
    }
}