<?php

namespace App\Controller\Admin;

use App\Entity\ReservationHoraire;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class ReservationHoraireCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ReservationHoraire::class;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TimeField::new('heure'),
            BooleanField::new('active'),
            IntegerField::new('nbPlace')
        ];
    }
   
}
