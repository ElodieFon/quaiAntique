<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Horaire;
use App\Entity\InfoResto;
use App\Entity\Product;
use App\Entity\Reservation;
use App\Entity\ReservationHoraire;
use App\Entity\Table;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

// TODO : faire la page connexion a la page admin
class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator){}

    #[Route('/admin', name: 'admin')]
    #[IsGranted("ROLE_ADMIN")]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        $url = $this->adminUrlGenerator
        ->setController(ProductCrudController::class)
        ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Le Quai Antique');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::section('Menu');
        yield MenuItem::subMenu('Produits','fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('ajouter un produit', 'fas fa-plus', Product::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('voir les produis', 'fas fa-eye', Product::class)
        ]);
        yield MenuItem::subMenu('Categorie','fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('ajouter une Categorie', 'fas fa-plus', Category::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('voir les Categories', 'fas fa-eye', Category::class)
        ]);

        yield MenuItem::section('Info du Restaurant');
        yield MenuItem::subMenu('générales','fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('ajouter un restaurant', 'fas fa-plus', InfoResto::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('voir les Restaurant', 'fas fa-eye', InfoResto::class)
        ]);
        yield MenuItem::subMenu('Horraires','fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('ajouter horaire', 'fas fa-plus', Horaire::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('voir les horaires', 'fas fa-eye', Horaire::class)
        ]);
        yield MenuItem::subMenu('Articles','fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('ajouter un article', 'fas fa-plus', Article::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('voir les articles', 'fas fa-eye', Article::class)
        ]);

        yield MenuItem::section('Gestion Reservation');   
        yield MenuItem::subMenu('reservation client','fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('ajouter une reservation', 'fas fa-plus', Reservation::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('voir les reservations', 'fas fa-eye', Reservation::class)
        ]);
        yield MenuItem::subMenu('config Horaire','fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('ajouter un horaire', 'fas fa-plus', ReservationHoraire::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('voir la liste des horaires', 'fas fa-eye', ReservationHoraire::class)
        ]);
    }
}