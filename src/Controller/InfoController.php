<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InfoController extends AbstractController
{
    #[Route('/info', name: 'app_info')]
    public function index(): Response
    {
        $titlePage = "A Propos";
        $subtitle = "";
        return $this->render('info/index.html.twig', [
            'titlePage'=>$titlePage , 
            'subtitle' => $subtitle
        ]);
    }
}
