<?php

namespace App\Controller\Admin;

use ApiPlatform\Doctrine\Odm\Filter\BooleanFilter;
use App\Entity\Dancer;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class DancerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dancer::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextEditorField::new('biography'),
            AssociationField::new('dance_style','Choisir un style de danse'),
            BooleanField::new('available','Disponible'),
        ];
    }
    
}
