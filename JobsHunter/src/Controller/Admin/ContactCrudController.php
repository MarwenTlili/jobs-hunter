<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class ContactCrudController extends AbstractCrudController {
    private $entityManager;
    private $adminUrlGenerator;

    public function __construct(EntityManagerInterface $entityManager, AdminUrlGenerator $adminUrlGenerator) {
        $this->entityManager = $entityManager;
        $this->adminUrlGenerator = $adminUrlGenerator;
    }

    public static function getEntityFqcn(): string {
        return Contact::class;
    }

    public function configureCrud(Crud $crud): Crud {
        return $crud
            ->showEntityActionsInlined()
            // the labels used to refer to this entity in titles, buttons, etc.
            ->setEntityLabelInSingular('Contact')
            ->setEntityLabelInPlural('Contacts')
        ;
    }

    public function configureFields(string $pageName): iterable {
        return [
            TextareaField::new('status', 'Status')  // should define getStatus() in Entity
                ->setVirtual(true)
                ->formatValue(function ($value, $entity) {
                    return $entity->getIsOpen()
                        ? '<i class="fa fa-envelope-open" style="color: green;"></i>'
                        : '<i class="fa fa-envelope" style="color: red;"></i>';
                })
                ->renderAsHtml()
                ->onlyOnIndex(),
            TextField::new('fullName'),
            EmailField::new('email'),
            TextareaField::new('message')
                ->renderAsHtml()
                ->onlyOnDetail(),
            TextareaField::new('message')->renderAsHtml()
                ->formatValue(function ($value) {
                    return (strlen($value) > 30) ? substr($value, 0, 30) . ' ...' : $value;
                })
                ->onlyOnIndex(),
        ];
    }

    public function configureActions(Actions $actions): Actions {
        $showAction = Action::new('detail', 'Read')
            ->linkToCrudAction('detailCustomAction'); // default: detail

        $markAsUnread = Action::new('markAsUnreadAction', 'Mark as unread')
            ->linkToCrudAction('markAsUnreadAction');

        return $actions
            ->disable(Action::NEW)
            ->add(Crud::PAGE_INDEX, $showAction)
            ->add(Crud::PAGE_INDEX, $markAsUnread)
            ->remove(Crud::PAGE_INDEX, Action::EDIT)
            ->remove(Crud::PAGE_DETAIL, Action::EDIT)
        ;
    }

    public function detailCustomAction(AdminContext $context) {
        /** @var \App\Entity\Contact $contact */
        $contact = $context->getEntity()->getInstance();

        if (!$contact->getIsOpen()) {
            $contact->setIsOpen(true);
            $this->entityManager->flush();
        }

        // #generating-admin-urls
        $url = $this->adminUrlGenerator
            ->setController(ContactCrudController::class)
            ->setAction('detail')
            ->generateUrl();

        // Redirect to the EasyAdmin detail page
        return $this->redirect($url);
    }

    // Custom AJAX action to toggle isOpen field
    public function markAsUnreadAction(AdminContext $context) {
        /** @var \App\Entity\Contact $contact */
        $contact = $context->getEntity()->getInstance();

        $url = $this->adminUrlGenerator
            ->setController(ContactCrudController::class)
            ->setAction('index')
            ->generateUrl();

        // Escape setting isOpen to false
        if (!$contact->getIsOpen()) return $this->redirect($url);

        if ($contact && $contact->getIsOpen()) {
            $contact->setIsOpen(false);
            $this->entityManager->flush();
        }

        // Redirect to the EasyAdmin index page
        return $this->redirect($url);
    }
}
