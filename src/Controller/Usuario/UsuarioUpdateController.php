<?php

namespace App\Controller\Usuario;

use App\Form\Usuario\UsuarioUpdateType;
use App\Usuario\Application\Update\UsuarioUpdate;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsuarioUpdateController extends AbstractController
{
    public function __construct(private UsuarioUpdate $update)
    {}

    /**
     * @Route("/usuarioUpdate", name="usuario_update")
     * @param Request $request
     * @return Response
     */
    public function usuarioUpdate(Request $request): Response
    {
        $form = $this->createForm(UsuarioUpdateType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $this->update->update($this->getUser(), $data['nombre'], $data['apellidos'], $data['telefono'], $data['email']);
        }
        return $this->redirectToRoute('perfil');
    }
}