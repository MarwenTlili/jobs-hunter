<?php

namespace App\Controller;

use App\Entity\Job;
use App\Entity\Profession;
use App\Form\ProfessionType;
use App\Repository\JobRepository;
use App\Repository\ProfessionRepository;
use App\Service\ProfessionsService;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/profession")
 */
class ProfessionController extends AbstractController
{
    /**
     * @Route("/", name="profession_index", methods={"GET"})
     */
    public function index(ProfessionRepository $professionRepository): Response
    {
        return $this->render('profession/index.html.twig', [
            'professions' => $professionRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="profession_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $profession = new Profession();
        $form = $this->createForm(ProfessionType::class, $profession);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($profession);
            $entityManager->flush();

            return $this->redirectToRoute('profession_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profession/new.html.twig', [
            'profession' => $profession,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="profession_show", methods={"GET"})
     */
    public function show(Profession $profession): Response
    {
        return $this->render('profession/show.html.twig', [
            'profession' => $profession,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="profession_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Profession $profession): Response
    {
        $form = $this->createForm(ProfessionType::class, $profession);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('profession_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profession/edit.html.twig', [
            'profession' => $profession,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="profession_delete", methods={"POST"})
     */
    public function delete(Request $request, Profession $profession): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profession->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($profession);
            $entityManager->flush();
        }

        return $this->redirectToRoute('profession_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/{name}/jobs", name="profession_jobs")
     */
    public function getJobs(Request $request, Profession $profession, PaginatorInterface $paginator): Response
    {
        $items = $profession->getJobs();
        $jobs = $paginator->paginate(
            $items, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            JobRepository::PAGINATOR_PER_PAGE /*limit per page*/
        );

        return $this->render('profession/jobs.html.twig', [
            // 'jobs' => $profession->getJobs(),
            'jobs' => $jobs,
            'jobsCount' => count($items),
        ]);
    }

    /**
     * @Route("/get/names", name="profession_names", methods={"GET"})
     */
    public function getNames(ProfessionsService $professionsService): Response
    {
        return $this->render('profession/_list.html.twig', [
            'professions' => $professionsService->getProfessions()
        ]);
    }
}
