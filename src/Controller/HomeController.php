<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $titlePage = "Le Quai Antique";
        $subtitle = "Faites Voyager Vos Papilles";
        
        return $this->render('home/index.html.twig', [
            'titlePage' => $titlePage , 'subtitle' => $subtitle
        ]);
    }
}
