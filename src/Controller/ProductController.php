<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\HoraireRepository;
use App\Repository\InfoRestoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/product')]
class ProductController extends AbstractController
{
   
    #[Route('/{id}', name: 'app_product_show', methods: ['GET'])]
    public function show(
        Product $product ,   
        HoraireRepository $horaire ,
        InfoRestoRepository $infoResto, ): Response
    {
        $infosResto = $infoResto->findAll();
        $horaires = $horaire->findAll();
        $titlePage = "Nos menu";
        $subtitle = "";
        return $this->render('product/show.html.twig', [
            'product' => $product,
            'infosResto'=>$infosResto,
            'horaires' => $horaires,
            'titlePage'=>$titlePage , 
            'subtitle' => $subtitle
        ]);
    }

}
