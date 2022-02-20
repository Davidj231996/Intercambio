<?php

namespace App\Controller\Usuario;

use App\Form\Direccion\DireccionUpdateType;
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
        /** @var Usuario $usuario */
        $usuario = $this->getUser();
        $usuarioForm = $this->createForm(UsuarioUpdateType::class, $usuario);
        $passwordForm = $this->createForm(UsuarioPasswordType::class, [
            'usuario' => $usuario
        ], [
            'action' => $this->generateUrl('updatePassword')
        ]);
        $direccionForm = $this->createForm(DireccionUpdateType::class, $usuario->direccion());
        return $this->render('usuario/perfil.html.twig', [
            'usuario' => $usuario,
            'usuarioForm' => $usuarioForm->createView(),
            'passwordForm' => $passwordForm->createView(),
            'direccionForm' => $direccionForm->createView()
        ]);
    }
}