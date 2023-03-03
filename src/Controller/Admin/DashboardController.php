<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Horaire;
use App\Entity\InfoResto;
use App\Entity\Product;
use App\Entity\Reservation;
use App\Entity\ReservationHoraire;
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
    public function __construct(private AdminUrlGenerator $adminUrlGenerator){

    }
    
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

        yield MenuItem::section('Products');
        yield MenuItem::subMenu('Actions','fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('add product', 'fas fa-plus', Product::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('show products', 'fas fa-eye', Product::class)
        ]);
        yield MenuItem::section('Categories');
        yield MenuItem::subMenu('Actions','fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('add Category', 'fas fa-plus', Category::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('show Categories', 'fas fa-eye', Category::class)
        ]);
        yield MenuItem::section('Info Resto');
        yield MenuItem::subMenu('générales','fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('add Info', 'fas fa-plus', InfoResto::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('show Infos', 'fas fa-eye', InfoResto::class)
        ]);
        yield MenuItem::subMenu('Horraires','fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('add horaire', 'fas fa-plus', Horaire::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('show horaires', 'fas fa-eye', Horaire::class)
        ]);
        yield MenuItem::subMenu('Articles','fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('add article', 'fas fa-plus', Article::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('show articles', 'fas fa-eye', Article::class)
        ]);
        yield MenuItem::section('Gestion reservation');
        yield MenuItem::subMenu('Heures','fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('add Heure', 'fas fa-plus', ReservationHoraire::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('show Heures', 'fas fa-eye', ReservationHoraire::class)
        ]);
        yield MenuItem::subMenu('Reservations','fas fa-bars')->setSubItems([
            MenuItem::linkToCrud('add reservation', 'fas fa-plus', Reservation::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('show reservations', 'fas fa-eye', Reservation::class)
        ]);
    }
}
