<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Category::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            BooleanField::new('active'),
            DateTimeField::new('updateAt')->hideOnForm(),
            DateTimeField::new('createdAt')->hideOnForm(),    
        ];
    }
    public function persistEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof Category) return;

        $entityInstance->setCreatedAt(new \DateTimeImmutable());

        $entityInstance->setUpdateAt(new \DateTimeImmutable());

        parent::persistEntity($entityManager , $entityInstance);
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof Category) return;

        $entityInstance->setUpdateAt(new \DateTimeImmutable());

        parent::updateEntity($entityManager , $entityInstance);
    }
    public function deleteEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if (!$entityInstance instanceof Category) return;

       foreach($entityInstance->getProducts() as $product){
            $entityManager->remove($product);
       }

       parent::deleteEntity($entityManager , $entityInstance);
    }
}
