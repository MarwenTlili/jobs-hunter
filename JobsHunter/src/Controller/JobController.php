<?php

namespace App\Controller;

use App\Entity\Company;
use App\Entity\Job;
use App\Form\JobType;
use App\Form\SearchJobsType;
use App\Repository\JobRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/job")
 */
class JobController extends AbstractController
{
    /**
     * @Route("/", name="job_index", methods={"GET", "GET"})
     */
    public function index(Request $request, JobRepository $jobRepository, PaginatorInterface $paginator): Response
    {
        // $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $form = $this->createForm(SearchJobsType::class, [
            'action' => $this->generateUrl('job_index'),
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $items = $jobRepository->searchAllDESC($data);
        }else{
            $items = $jobRepository->findAllDESC();
        }

        $jobs = $paginator->paginate(
            $items, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            JobRepository::PAGINATOR_PER_PAGE /*limit per page*/
        );

        return $this->render('job/index.html.twig', [
            'jobs' => $jobs,
            'jobsCount' => count($items),
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/new/{slug}", name="job_new", methods={"GET","POST"})
     */
    public function new(Request $request, Company $company): Response
    {
        $job = new Job();
        $job->setCompany($company);
        $job->setCountry($company->getCountry());

        #######################################################################
        // Test
        $job->setTitle("Développeur (H/F) PHP / Symfony");
        $job->setExpireAt(new \DateTimeImmutable());
        $job->setPostsNumber(2);
        #######################################################################

        $form = $this->createForm(JobType::class, $job);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($job);
            $entityManager->flush();

            return $this->redirectToRoute('job_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('job/new.html.twig', [
            'job' => $job,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", name="job_show", methods={"GET"})
     */
    public function show(Job $job): Response
    {
        return $this->render('job/show.html.twig', [
            'job' => $job,
        ]);
    }

    /**
     * @Route("/{slug}/edit", name="job_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Job $job): Response
    {
        $this->denyAccessUnlessGranted('ROLE_COMPANY');
        
        $form = $this->createForm(JobType::class, $job);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('company_offers', ['slug' => $job->getCompany()->getSlug()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('job/edit.html.twig', [
            'job' => $job,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", name="job_delete", methods={"POST"})
     */
    public function delete(Request $request, Job $job): Response
    {
        if ($this->isCsrfTokenValid('delete'.$job->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($job);
            $entityManager->flush();
        }

        return $this->redirectToRoute('job_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/recent-jobs/{max}", name="jobs_recent")
     */
    public function recentJobs(JobRepository $jobRepository, int $max): Response
    {
        return $this->render('job/_recent_jobs.html.twig', [
            'jobs' => $jobRepository->getLastJobs($max)
        ]);
    }
}
