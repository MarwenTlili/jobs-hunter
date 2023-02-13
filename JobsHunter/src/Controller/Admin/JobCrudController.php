<?php

namespace App\Controller\Admin;

use App\Entity\Job;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class JobCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Job::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextField::new('address'),
            DateField::new('expireAt'),
            NumberField::new('postsNumber'),
            TextField::new('type'),
            NumberField::new('experienceMin'),
            NumberField::new('experienceMax'),
            TextField::new('educationLevel'),
            NumberField::new('salaryMin'),
            NumberField::new('salayMax'),
            TextField::new('requiredLanguages'),
            TextEditorField::new('description'),
            TextEditorField::new('requirements'),
            AssociationField::new('Company'),
            AssociationField::new('country'),
            AssociationField::new('tags'),

        ];
    }
}
