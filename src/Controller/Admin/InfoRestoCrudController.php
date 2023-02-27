<?php

namespace App\Controller\Admin;

use App\Entity\InfoResto;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;


class InfoRestoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return InfoResto::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            BooleanField::new('active'),
            TelephoneField::new('telephone'),
            EmailField::new('email'),
            TextField::new('adresse'),
            TextField::new('cp'),
            TextField::new('ville'),
            TextField::new('pays')
        ];
    }
   
}
