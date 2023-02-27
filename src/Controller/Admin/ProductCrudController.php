<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\QueryBuilder;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;

class ProductCrudController extends AbstractCrudController
{
    public const ACTION_DUPLICATE = 'duplicate';
    
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureActions(Actions $actions): Actions{
        $duplicate = Action::new(self::ACTION_DUPLICATE)
        ->linkToCrudAction('duplicateProduct')
        ->setCssClass('btn btn-info');
        return $actions
        ->add(Crud::PAGE_EDIT,$duplicate)
        ->reorder(Crud::PAGE_EDIT,[self::ACTION_DUPLICATE, Action::SAVE_AND_RETURN]);
        
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name','nom'),
            TextEditorField::new('description'),
            MoneyField::new('prix')->setCurrency('EUR'),
            ImageField::new('image')
            ->setBasePath(('images/products'))
            ->setUploadDir('public/images/products')
            ->setSortable(false),
            BooleanField::new('active', 'produit en cour'),
            BooleanField::new('productOfMoment', 'produits du moment'),
            DateTimeField::new('createdAt', 'date de création')->hideOnForm(),  
            DateTimeField::new('updatedAt', 'date dernière modif')->hideOnForm(),    
            AssociationField::new('category', 'categorie')->setQueryBuilder(function (QueryBuilder $queryBuilder){
                $queryBuilder->where('entity.active = true');
            })
        ];
    }
  
    public function duplicateProduct(
        AdminContext $adminContext , 
        EntityManagerInterface $entityManager,
        AdminUrlGenerator $adminUrlGenerator
        ) : Response {

        /** @var Product $product */
       $product = $adminContext->getEntity()->getInstance(); 

       $duplicatedProduct = clone $product ;

       parent::persistEntity($entityManager , $duplicatedProduct);
       $url = $adminUrlGenerator->setController(self::class)
       ->setAction(Action::DETAIL)
       ->setEntityId($duplicatedProduct->getId())
       ->generateUrl();
        
       return $this->redirect($url);
    }
}
