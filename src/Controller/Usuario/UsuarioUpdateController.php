<?php

namespace App\Controller\Usuario;

use App\Usuario\Application\Update\UsuarioUpdate;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsuarioUpdateController extends AbstractController
{
    public function __construct(private UsuarioUpdate $update)
    {}

    /**
     * @Route("/usuarioUpdate/{id}/{alias}/{nombre}/{apellidos}/{telefono}/{email}/{password}")
     * @param int $id
     * @param string $alias
     * @param string $nombre
     * @param string $apellidos
     * @param string $telefono
     * @param string $email
     * @param string $password
     * @return Response
     */
    public function usuarioUpdate(int $id, string $alias, string $nombre, string $apellidos, string $telefono, string $email, string $password): Response
    {
        $this->update->update($id, $alias, $nombre, $apellidos, $telefono, $email);
        return $this->redirectToRoute('usuario', ['usuarioId' => $id]);
    }
}