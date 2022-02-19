<?php

namespace App\Controller\Usuario;

use App\Form\Direccion\DireccionUpdateType;
use App\Form\Usuario\UsuarioPasswordType;
use App\Form\Usuario\UsuarioUpdateType;
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
        $usuarioForm = $this->createForm(UsuarioUpdateType::class, $usuario);
        $passwordForm = $this->createForm(UsuarioPasswordType::class, [
            'usuario' => $usuario
        ], [
            'action' => $this->generateUrl('updatePassword')
        ]);
        $direccionForm = $this->createForm(DireccionUpdateType::class, $usuario->direccion());
        return $this->render('usuario.html.twig', [
            'usuario' => $usuario,
            'usuarioForm' => $usuarioForm->createView(),
            'passwordForm' => $passwordForm->createView(),
            'direccionForm' => $direccionForm->createView()
        ]);
    }
}