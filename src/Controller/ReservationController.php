<?php

namespace App\Controller;

use App\Repository\HoraireRepository;
use App\Repository\InfoRestoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'app_reservation')]
    public function index(
        HoraireRepository $horaire ,
        InfoRestoRepository $infoResto,
    ): Response
    {
        $infosResto = $infoResto->findAll();
        $horaires = $horaire->findAll();
        $titlePage = "Reservation";
        $subtitle = "";

        return $this->render('reservation/index.html.twig', [
            'infosResto'=>$infosResto,
            'horaires' => $horaires,
            'titlePage'=>$titlePage , 
            'subtitle' => $subtitle
        ]);
    }
}
