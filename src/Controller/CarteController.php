<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarteController extends AbstractController
{
    #[Route('/carte', name: 'app_carte')]
    public function index(): Response
    {
        $titlePage = "Nos menu";
        $subtitle = "";

        return $this->render('carte/index.html.twig', [
            'titlePage'=>$titlePage , 
            'subtitle' => $subtitle
            
        ]);
    }
}
