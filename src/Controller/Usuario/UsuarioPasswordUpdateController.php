<?php

namespace App\Controller\Usuario;

use App\Form\Usuario\UsuarioPasswordType;
use App\Usuario\Application\Check\UsuarioCheck;
use App\Usuario\Application\PasswordUpdate\UsuarioPasswordUpdate;
use App\Usuario\Domain\Usuario;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsuarioPasswordUpdateController extends AbstractController
{
    public function __construct(private UsuarioPasswordUpdate $usuarioPasswordUpdate, private UsuarioCheck $usuarioCheck)
    {
    }

    /**
     * @Route("/updatePassword", name="update_password")
     * @param Request $request
     * @return Response
     */
    public function usuario(Request $request): Response
    {
        $form = $this->createForm(UsuarioPasswordType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Usuario $usuario */
            $usuario = $this->getUser();
            $data = $form->getData();
            if ($this->usuarioCheck->check($usuario, $data['currentPassword'])) {
                $this->usuarioPasswordUpdate->updatePassword($usuario, $data['newPassword']);
            }
        }
        return $this->redirectToRoute('perfil');
    }
}