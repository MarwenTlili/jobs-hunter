<?php

namespace App\Controller\Admin;

use App\Entity\Company;
use App\Entity\Country;
use App\Entity\Job;
use App\Entity\Profession;
use App\Entity\Seeker;
use App\Entity\Tag;
use App\Entity\Training;
use App\Entity\User;
use App\Entity\Contact;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * Require ROLE_ADMIN for *every* controller method in this class.
 *
 * @IsGranted("ROLE_ADMIN")
 */
class DashboardController extends AbstractDashboardController {
    /**
     * @Route("/admin", name="admin_homepage")
     */
    public function index(): Response {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');
        // or add an optional message - seen by developers
        // $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'User tried to access a page without having ROLE_ADMIN');

        // return parent::index();
        $routeBuilder = $this->get(AdminUrlGenerator::class);
        return $this->redirect($routeBuilder->setController(UserCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard {
        return Dashboard::new()->setTitle('Jobshunter');
    }

    public function configureMenuItems(): iterable {
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linktoRoute('Home', 'fa fa-home', 'app_homepage');
        yield MenuItem::linkToCrud('Users', 'fa fa-users', User::class);
        yield MenuItem::linkToCrud('Tags', 'fa fa-tags', Tag::class);
        yield MenuItem::linkToCrud('Countries', 'fa fa-globe', Country::class);
        yield MenuItem::linkToCrud('Companies', 'fa fa-building', Company::class);
        yield MenuItem::linkToCrud('Seekers', 'fa fa-id-badge', Seeker::class);
        yield MenuItem::linkToCrud('Trainings', 'fa fa-certificate', Training::class);
        yield MenuItem::linkToCrud('Jobs', 'fa fa-user-tie', Job::class);
        yield MenuItem::linkToCrud('Professions', 'fa fa-clipboard', Profession::class);
        yield MenuItem::linkToCrud('Messages', 'fa fa-envelope', Contact::class);
    }
}
