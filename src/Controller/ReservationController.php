<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\HoraireRepository;
use App\Repository\InfoRestoRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Id;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class ReservationController extends AbstractController
{   

    #[Route('/reservation', name: 'app_reservation')]
    #[IsGranted("ROLE_USER")]
    public function index(
        HoraireRepository $horaire ,
        InfoRestoRepository $infoResto,
        EntityManagerInterface $entityManager,
        Request $request, 
       
    ): Response
    {
        
        $user = $this->getUser();
        $infosResto = $infoResto->findAll();
        $horaires = $horaire->findAll();
        $titlePage = "Reservation";
        $subtitle = "";
        $message = "Bonjour $user";
        
        $form = $this-> createForm(ReservationType::class );
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

          
            $reservation = $form->getData();
            $entityManager->persist($reservation);
            $entityManager->flush();
        }
        return $this->render('reservation/index.html.twig', [
            'infosResto'=>$infosResto ,
            'horaires' => $horaires ,
            'titlePage'=>$titlePage , 
            'subtitle' => $subtitle,
            'message' =>$message,
            'form' => $form->createView(),
            
        ]);
    }
}
