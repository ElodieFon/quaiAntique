<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\HoraireRepository;
use App\Repository\InfoRestoRepository;
use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'app_reservation')]
    #[IsGranted("ROLE_USER")]
    public function index(
        HoraireRepository $horaire ,
        InfoRestoRepository $infoResto,
        Request $request, 
        ReservationRepository $reservationRepository,
        EntityManagerInterface $entityManager,
        UserInterface $user,
        MailerInterface $mailer
    ): Response
    {   

        $titlePage = "Reservation";
        $subtitle = "";

        $infosResto = $infoResto->findAll();
        $horaires = $horaire->findAll();

        $reservation = new Reservation(); 
        $reservation->setUser($user); 
        $reservationDate = "";
        $rDate = "";
        $message = "";
        $messageSuccess= "";

        $form = $this-> createForm(ReservationType::class , $reservation, ['user' => $user]);
		$form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){  

			$reservation = $form->getData();
            $reservations = $reservationRepository->findByDate($reservation->getDate()); 
            $reservationDate = $reservation->getDate()->format('d/m/Y');
            $reservationTime = $reservation->getHeure();
            $reservationChildren = $reservation->getNbChildren();
            $reservationPersons = $reservation->getNbPersons();
            $nbPersonsTotal = 0;
            $nbPlace = $reservationTime->getNbplace();
          
            $mailUser = $reservation->getUser()->getEmail();
            $messageSuccess = "Votre reservation pour le $reservationDate à $reservationTime a bien été enregistrée !"; 
           
            foreach ($reservations as $r) {   
                $rDate = $r->getDate()->format('d/m/Y'); 
                $rTime = $r->getHeure();
                $nbPersonsTotal += $r->getNbPersons();    
                 
            }    
            if($rDate == $reservationDate && $rTime == $reservationTime && $reservationPersons > ($nbPlace - $nbPersonsTotal)){
                $message = "Navré nous n'avons pas de disponibilitée à cette heure pour le moment!"; 
            }
            elseif ($reservationChildren > $reservationPersons){
                $message = "Le nombre de place demandé ne peut etre inférieur au nombre de personne presentes à la table.
                Vous avez indiqué vouloir $reservationPersons couverts mais vous avez indiquer la présence de $reservationChildren enfants, 
                ";
            } 
            else{
                $entityManager->persist($reservation);
                $entityManager->flush(); 
                $message = $messageSuccess; 
                $email = (new Email())
                ->from('noreply.LequaiAntique@noreply.com')
                ->to($mailUser)
                ->subject('Confirmation de reservation')
                ->text($messageSuccess);
                $mailer->send($email);
            }       
           
		}
        return $this->render('reservation/index.html.twig', [
            'infosResto'=>$infosResto,
            'horaires' => $horaires,
            'titlePage'=>$titlePage , 
            'subtitle' => $subtitle,
            'form' => $form->createView(),
            'messageSuccess' => $messageSuccess,
			'message' => $message,
        ]);
        
    }
   
}
