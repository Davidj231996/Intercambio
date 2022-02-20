<?php

namespace App\Controller\Usuario;

use App\Usuario\Domain\UsuarioFinder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsuarioController extends AbstractController
{
    public function __construct(private UsuarioFinder $finder)
    {
    }

    /**
     * @Route("/usuario/{usuarioId}", name="usuario")
     * @param int $usuarioId
     * @return Response
     */
    public function usuario(int $usuarioId): Response
    {
        $usuario = $this->finder->__invoke($usuarioId);
        return $this->render('usuario/usuario.html.twig', [
            'usuario' => $usuario
        ]);
    }
}