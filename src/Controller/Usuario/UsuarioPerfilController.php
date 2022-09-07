<?php

namespace App\Controller\Usuario;

use App\Form\Direccion\DireccionUpdateType;
use App\Form\Usuario\UsuarioImagenType;
use App\Form\Usuario\UsuarioPasswordType;
use App\Form\Usuario\UsuarioUpdateType;
use App\Usuario\Domain\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsuarioPerfilController extends AbstractController
{
    public function __construct()
    {
    }

    /**
     * @Route("/perfil", name="perfil")
     * @return Response
     */
    public function usuario(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        /** @var Usuario $usuario */
        $usuario = $this->getUser();
        $usuarioForm = $this->createForm(UsuarioUpdateType::class, $usuario, [
            'action' => $this->generateUrl('usuario_update')
        ]);
        $passwordForm = $this->createForm(UsuarioPasswordType::class, [
            'usuario' => $usuario
        ], [
            'action' => $this->generateUrl('update_password')
        ]);
        $direccionForm = $this->createForm(DireccionUpdateType::class, $usuario->direccion(), [
            'action' => $this->generateUrl('direccion_update')
        ]);
        $imagenUsuarioForm = $this->createForm(UsuarioImagenType::class, [], [
            'action' => $this->generateUrl('imagenUsuario')
        ]);
        return $this->render('usuario/perfil.html.twig', [
            'usuario' => $usuario,
            'usuarioForm' => $usuarioForm->createView(),
            'passwordForm' => $passwordForm->createView(),
            'direccionForm' => $direccionForm->createView(),
            'imagenUsuarioForm' => $imagenUsuarioForm->createView()
        ]);
    }
}