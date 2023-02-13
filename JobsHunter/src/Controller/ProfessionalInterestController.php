<?php

namespace App\Controller;

use App\Entity\ProfessionalInterest;
use App\Form\ProfessionalInterestType;
use App\Repository\ProfessionalInterestRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/professional-interest")
 */
class ProfessionalInterestController extends AbstractController
{
    /**
     * @Route("/", name="professional_interest_index", methods={"GET"})
     */
    public function index(Request $request,ProfessionalInterestRepository $ProfessionalInterestRepository): Response
    {
        $seeker = $this->getUser()->getSeeker();

        if (!$seeker->getCv()) {
            return $this->redirectToRoute('seeker_new');
        }
       
        if (!$seeker->getCv()->getProfessionalInterest()) {
            return $this->redirectToRoute('professional_interest_new', [], Response::HTTP_SEE_OTHER);
        }else{
            return $this->redirectToRoute('professional_interest_edit', [
                'id' => $seeker->getCv()->getProfessionalInterest()->getId()
            ]);
        }
    }

    /**
     * @Route("/new", name="professional_interest_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $request = $this->get('request_stack')->getMasterRequest();
        $professionalInterest = new ProfessionalInterest();
        $form = $this->createForm(ProfessionalInterestType::class, $professionalInterest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($professionalInterest);
            
            $cv = $this->getUser()->getSeeker()->getCv();
            $cv->setProfessionalInterest($professionalInterest);
            $entityManager->persist($cv);

            $entityManager->flush();
            return $this->redirectToRoute('professional_interest_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('professional_interest/new.html.twig', [
            'professional_interest' => $professionalInterest,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="professional_interest_show", methods={"GET"})
     */
    public function show(ProfessionalInterest $professionalInterest): Response
    {
        return $this->render('professional_interest/show.html.twig', [
            'professional_interest' => $professionalInterest,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="professional_interest_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ProfessionalInterest $professionalInterest): Response
    {
        $form = $this->createForm(ProfessionalInterestType::class, $professionalInterest);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('professional_interest_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('professional_interest/edit.html.twig', [
            'professional_interest' => $professionalInterest,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="professional_interest_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfessionalInterest $professionalInterest): Response
    {
        if ($this->isCsrfTokenValid('delete'.$professionalInterest->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($professionalInterest);
            $entityManager->flush();
        }

        return $this->redirectToRoute('professional_interest_index', [], Response::HTTP_SEE_OTHER);
    }
}
