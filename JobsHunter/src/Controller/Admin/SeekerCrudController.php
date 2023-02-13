<?php

namespace App\Controller\Admin;

use App\Entity\Seeker;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SeekerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Seeker::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('firstName'),
            TextField::new('lastName'),
            TextField::new('civility'),
            DateField::new('birthDate'),
            TextField::new('address'),
            AssociationField::new('user'),
            AssociationField::new('country'),
        ];
    }
}
