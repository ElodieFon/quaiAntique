<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\HoraireRepository;
use App\Repository\InfoRestoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InfoController extends AbstractController
{
    #[Route('/info', name: 'app_info')]
    public function index(
        HoraireRepository $horaire ,
        InfoRestoRepository $infoResto, 
        ArticleRepository $article
    ): Response
    {
        $infosResto = $infoResto->findAll();
        $horaires = $horaire->findAll();
        $articles = $article->findAll();
        $titlePage = "A Propos";
        $subtitle = "";
        return $this->render('info/index.html.twig', [
            'articles'=> $articles,
            'infosResto'=>$infosResto,
            'horaires' => $horaires,
            'titlePage'=>$titlePage , 
            'subtitle' => $subtitle
        ]);
    }
}
