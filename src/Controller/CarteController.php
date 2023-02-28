<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\HoraireRepository;
use App\Repository\InfoRestoRepository;
use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarteController extends AbstractController
{
    #[Route('/carte', name: 'app_carte')]
    public function index(
        HoraireRepository $horaire ,
        InfoRestoRepository $infoResto,
        ProductRepository $productRepository, 
        CategoryRepository $categoryRepository
    ): Response
    {
        $titlePage = "Nos menu";
        $subtitle = "";
        $infosResto = $infoResto->findAll();
        $horaires = $horaire->findAll();
        $products = $productRepository->findAll();
        $categories = $categoryRepository->findAll();
        return $this->render('carte/index.html.twig', [
            'infosResto' => $infosResto,
            'horaires' => $horaires,
            'titlePage'=>$titlePage , 
            'subtitle' => $subtitle ,
            'products' => $products,
            'categories' => $categories
        ]);
    }
}