<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CarteController extends AbstractController
{
    #[Route('/carte', name: 'app_carte')]
    public function index(ProductRepository $productRepository): Response
    {
        $titlePage = "Nos menu";
        $subtitle = "";
        $products = $productRepository->findAll();
        return $this->render('carte/index.html.twig', [
            'titlePage'=>$titlePage , 
            'subtitle' => $subtitle ,
            'products' => $products
        ]);
    }
}
