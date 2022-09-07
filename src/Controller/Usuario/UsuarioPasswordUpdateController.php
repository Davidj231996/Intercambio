<?php

namespace App\Controller\Usuario;

use App\Form\Usuario\UsuarioPasswordType;
use App\Usuario\Application\Check\UsuarioCheck;
use App\Usuario\Application\PasswordUpdate\UsuarioPasswordUpdate;
use App\Usuario\Domain\Usuario;
use Exception;
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
        $this->denyAccessUnlessGranted('ROLE_USER');
        $form = $this->createForm(UsuarioPasswordType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var Usuario $usuario */
            $usuario = $this->getUser();
            $data = $form->getData();
            if ($this->usuarioCheck->check($usuario, $data['currentPassword'])) {
                try {
                    $this->usuarioPasswordUpdate->updatePassword($usuario, $data['newPassword']);
                    $this->addFlash(
                        'success',
                        'Contraseña actualizada'
                    );
                } catch (Exception) {
                    $this->addFlash(
                        'warning',
                        'Error al actualizar la contraseña'
                    );
                }
            } else {
                $this->addFlash(
                    'warning',
                    'La contraseña actual no es la correcta'
                );
            }
        }
        return $this->redirectToRoute('perfil');
    }
}