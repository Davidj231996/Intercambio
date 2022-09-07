<?php

namespace App\Controller\Usuario;

use App\Categoria\Application\AllFinder\CategoriasAllFinder;
use App\Contacto\Domain\ContactoRepository;
use App\LogIntercambio\Application\TodayFinder\LogIntercambioTodayFinder;
use App\LogIntercambio\Application\WeekFinder\LogIntercambioWeekFinder;
use App\LogObjeto\Application\TodayFinder\LogObjetoTodayFinder;
use App\LogObjeto\Application\WeekFinder\LogObjetoWeekFinder;
use App\LogReserva\Application\TodayFinder\LogReservaTodayFinder;
use App\LogReserva\Application\WeekFinder\LogReservaWeekFinder;
use App\Objeto\Application\ObjetosDeshabilitadosFinder\ObjetosDeshabilitadosFinder;
use App\Objeto\Application\ObjetosHabilitadosFinder\ObjetosHabilitadosFinder;
use App\Usuario\Application\UsuariosDeshabilitadosFinder\UsuariosDeshabilitadosFinder;
use App\Usuario\Application\UsuariosHabilitadosFinder\UsuariosHabilitadosFinder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsuarioPerfilAdminController extends AbstractController
{
    public function __construct(
        private UsuariosHabilitadosFinder    $usuariosHabilitadosFinder,
        private UsuariosDeshabilitadosFinder $usuariosDeshabilitadosFinder,
        private ObjetosHabilitadosFinder     $objetosHabilitadosFinder,
        private ObjetosDeshabilitadosFinder  $objetosDeshabilitadosFinder,
        private CategoriasAllFinder          $categoriasAllFinder,
        private LogObjetoTodayFinder         $logObjetoTodayFinder,
        private LogObjetoWeekFinder          $logObjetoWeekFinder,
        private LogIntercambioTodayFinder    $logIntercambioTodayFinder,
        private LogIntercambioWeekFinder     $logIntercambioWeekFinder,
        private LogReservaTodayFinder        $logReservaTodayFinder,
        private LogReservaWeekFinder         $logReservaWeekFinder,
        private ContactoRepository           $contactoRepository
    )
    {
    }

    /**
     * @Route("/admin", name="perfil_admin")
     * @return Response
     */
    public function usuario(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        return $this->render('usuario/admin/admin.html.twig', [
            'usuario' => $this->getUser(),
            'usuariosHabilitados' => $this->usuariosHabilitadosFinder->finder(),
            'usuariosDeshabilitados' => $this->usuariosDeshabilitadosFinder->finder(),
            'objetosHabilitados' => $this->objetosHabilitadosFinder->finder(),
            'objetosDeshabilitados' => $this->objetosDeshabilitadosFinder->finder(),
            'categorias' => $this->categoriasAllFinder->__invoke(),
            'logObjetoToday' => $this->logObjetoTodayFinder->__invoke(),
            'logObjetoWeek' => $this->logObjetoWeekFinder->__invoke(),
            'logIntercambioToday' => $this->logIntercambioTodayFinder->__invoke(),
            'logIntercambioWeek' => $this->logIntercambioWeekFinder->__invoke(),
            'logReservaToday' => $this->logReservaTodayFinder->__invoke(),
            'logReservaWeek' => $this->logReservaWeekFinder->__invoke(),
            'contactosSinResponder' => $this->contactoRepository->searchNoContestados(),
            'contactosRespondidos' => $this->contactoRepository->searchContestados()
        ]);
    }
}