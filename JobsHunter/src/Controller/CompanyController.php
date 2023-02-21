<?php

namespace App\Controller;

use App\Entity\Company;
use App\Entity\User;
use App\Form\CompanyType;
use App\Repository\CompanyRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/company")
 */
class CompanyController extends AbstractController
{
    /**
     * @Route("/", name="company_index", methods={"GET", "POST"})
     */
    public function index(Request $request, CompanyRepository $companyRepository, PaginatorInterface $paginator): Response
    {
        $items = $companyRepository->findAllDESC();
        
        $companies = $paginator->paginate(
            $items, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            CompanyRepository::PAGINATOR_PER_PAGE /*limit per page*/
        );

        return $this->render('company/index.html.twig', [
            'companies' => $companies,
        ]);
    }

    /**
     * @Route("/new", name="company_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $company = new Company();
        $company->setUser($this->getUser());
        $form = $this->createForm(CompanyType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($company);
            $entityManager->flush();

            return $this->redirectToRoute('company_edit', [
                'slug' => $company->getSlug()
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->render('company/new.html.twig', [
            'company' => $company,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", name="company_show", methods={"GET"})
     */
    public function show(Company $company): Response
    {
        return $this->render('company/show.html.twig', [
            'company' => $company,
        ]);
    }

    /**
     * @Route("/{slug}/edit", name="company_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Company $company): Response
    {
        $form = $this->createForm(CompanyType::class, $company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('company_edit', [
                'slug' => $company->getSlug()
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->render('company/edit.html.twig', [
            'company' => $company,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", name="company_delete", methods={"POST"})
     */
    public function delete(Request $request, Company $company): Response
    {
        if ($this->isCsrfTokenValid('delete'.$company->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($company);
            $entityManager->flush();
        }

        return $this->redirectToRoute('company_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/{slug}/offers", name="company_offers")
     */
    public function offers(Request $request, PaginatorInterface $paginator, Company $company): Response
    {
        $items = $company->getJobs();
        
        $jobs = $paginator->paginate(
            $items, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            CompanyRepository::PAGINATOR_PER_PAGE /*limit per page*/
        );

        return $this->render('company/offers.html.twig', [
            'jobs' => $jobs,
        ]);
    }

    /**
     * @Route("/{user}/seeker_preview", name="cv_preview_for_company", methods={"GET"})
     */
    public function previewForCompany(User $user): Response{
        $this->denyAccessUnlessGranted('ROLE_COMPANY');
        dump($user);

        // /** @var \App\Entity\User $user */
        // $user = $this->security->getUser();
        $seeker = $user->getSeeker();
        $cv = $seeker->getCv();

        return $this->render('cv/preview_for_company.html.twig', [
            'cv' => $cv
        ]);
    }
}
