<?php

namespace App\Controller;

use App\Repository\HoraireRepository;
use App\Repository\InfoRestoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\ProductRepository;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        InfoRestoRepository $infoResto, 
        HoraireRepository $horaire ,
        ProductRepository $productRepository
    ): Response
    {
        $titlePage = "Le Quai Antique";
        $subtitle = "Faites Voyager Vos Papilles";
        $infosResto = $infoResto->findAll();
        $horaires = $horaire->findAll();
        $products = $productRepository->findAll();
        return $this->render('home/index.html.twig', [
            'titlePage' => $titlePage , 
            'subtitle' => $subtitle, 
            'products' => $products,
            'infosResto' => $infosResto,
            'horaires' => $horaires
        ]);
    }
}
