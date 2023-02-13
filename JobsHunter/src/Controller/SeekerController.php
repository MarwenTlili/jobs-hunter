<?php

namespace App\Controller;

use App\Entity\CV;
use App\Entity\Job;
use App\Entity\Seeker;
use App\Entity\User;
use App\Form\SeekerType;
use App\Repository\CountryRepository;
use App\Repository\SeekerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\PersistentCollection;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

/**
 * @Route("/seeker")
 */
class SeekerController extends AbstractController
{
    private $security;

    public function __construct(Security $security){
        $this->security = $security;
    }

    /**
     * @Route("/", name="seeker_index", methods={"GET"})
     */
    public function index(SeekerRepository $seekerRepository): Response
    {
        return $this->render('seeker/index.html.twig', [
            'seekers' => $seekerRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="seeker_new", methods={"GET","POST"})
     */
    public function new(Request $request, CountryRepository $countryRepository): Response
    {
        $seeker = new Seeker();
        $seeker->setUser($this->getUser()); // set current loged user
        $seeker->setCountry($countryRepository->findOneBy(['name' => 'Tunisia'])); // set default country
        $form = $this->createForm(SeekerType::class, $seeker);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var \App\Entity\CV $cv */
            $cv = new CV();
            $seeker->setCv($cv);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($seeker);
            $entityManager->persist($cv);
            $entityManager->flush();

            return $this->redirectToRoute('seeker_edit', [
                'id' => $seeker->getId()
            ], Response::HTTP_SEE_OTHER);
        }

        return $this->render('seeker/new.html.twig', [
            'seeker' => $seeker,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="seeker_show", methods={"GET"})
     */
    public function show(Seeker $seeker): Response
    {
        return $this->render('seeker/show.html.twig', [
            'seeker' => $seeker,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="seeker_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Seeker $seeker, User $user): Response
    {
        $user = $this->getUser();
        $seeker = $user->getSeeker();
        $form = $this->createForm(SeekerType::class, $seeker);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('seeker_edit', ['id' => $seeker->getId()], Response::HTTP_SEE_OTHER);
        }

        return $this->render('seeker/edit.html.twig', [
            'seeker' => $seeker,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="seeker_delete", methods={"POST"})
     */
    public function delete(Request $request, Seeker $seeker): Response
    {
        if ($this->isCsrfTokenValid('delete'.$seeker->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($seeker);
            $entityManager->flush();
        }

        return $this->redirectToRoute('seeker_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/apply/{job}", name="seeker_apply_job")
     */
    public function applyForJob(Job $job): Response
    {
        /** @var \App\Entity\User $user */
        $user = $this->security->getUser();

        /** @var \App\Entity\Seeker $seeker */
        $seeker = $user->getSeeker();
        dump($seeker);

        // /** @var \App\Entity\Job $job */
        dump($job);

        $seeker->addApplyedJob($job);
        $manager = $this->getDoctrine()->getManager();
        $manager->persist($seeker);
        $manager->flush();

        $this->addFlash(
           'success',
           'you successfuly applyed for job "'.$job->getTitle().'"'
        );

        return $this->redirectToRoute('job_show', [
            'slug' => $job->getSlug()
        ], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/list/{slug}", name="seekers_show", methods={"GET"})
     */
    public function list(Job $job): Response
    {
        $seekers = $job->getSeekersApplyed();
        return $this->render('seeker/index.html.twig', [
            'seekers' => $seekers,
        ]);
    }
}
