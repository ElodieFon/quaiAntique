<?php

namespace App\Controller;

use App\Form\ContactType;
use App\Repository\HoraireRepository;
use App\Repository\InfoRestoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request ;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(
		HoraireRepository $horaire ,
		InfoRestoRepository $infoResto, 
		Request $request , 
		MailerInterface $mailer
	): Response
    {
		$infosResto = $infoResto->findAll();
		$horaires = $horaire->findAll();
        $titlePage = "Nous Contacter";
      	$subtitle = "";
		$sucessMessage = "";
        	
		$form = $this-> createForm(ContactType::class );
		$form->handleRequest($request);


		if($form->isSubmitted() && $form->isValid()){
			$contact = $form->getData();

			$adress = $contact['email'];
			$message = $contact['message'];
			
			$email = (new Email())
			->from($adress)
			->to('admin@admin.com')
			->subject('Demande de contact')
			->text($message);

			$mailer->send($email);

			$sucessMessage = "votre message a bien était envoyé !";
		}
        return $this->render('contact/index.html.twig', [
			'infosResto'=>$infosResto,
            'horaires' => $horaires,
            'titlePage'=>$titlePage , 
            'subtitle' => $subtitle ,
            'form' => $form->createView(),
			'message' => $sucessMessage
        ]);
    }
}
