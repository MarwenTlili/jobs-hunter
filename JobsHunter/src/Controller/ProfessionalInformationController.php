<?php

namespace App\Controller;

use App\Entity\ProfessionalInformation;
use App\Form\ProfessionalInformationType;
use App\Repository\ProfessionalInformationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/professional_information")
 */
class ProfessionalInformationController extends AbstractController
{
    /**
     * @Route("/", name="professional_information_index", methods={"GET"})
     */
    public function index(ProfessionalInformationRepository $professionalInformationRepository): Response
    {
        $seeker = $this->getUser()->getSeeker();
       
        if (!$this->getUser()->getSeeker()->getCv()->getProfessionalInformation()) {
            return $this->redirectToRoute('professional_information_new', [], Response::HTTP_SEE_OTHER);
        }else{
            return $this->redirectToRoute('professional_information_edit', [
                'id' => $seeker->getCv()->getProfessionalInformation()->getId()
            ]);
        }
    }

    /**
     * @Route("/new", name="professional_information_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $professionalInformation = new ProfessionalInformation();
        $form = $this->createForm(ProfessionalInformationType::class, $professionalInformation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($professionalInformation);

            $cv = $this->getUser()->getSeeker()->getCv();
            $cv->setProfessionalInformation($professionalInformation);
            $entityManager->persist($cv);
            
            $entityManager->flush();

            return $this->redirectToRoute('professional_information_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('professional_information/new.html.twig', [
            'professional_information' => $professionalInformation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="professional_information_show", methods={"GET"})
     */
    public function show(ProfessionalInformation $professionalInformation): Response
    {
        return $this->render('professional_information/show.html.twig', [
            'professional_information' => $professionalInformation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="professional_information_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ProfessionalInformation $professionalInformation): Response
    {
        $form = $this->createForm(ProfessionalInformationType::class, $professionalInformation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('professional_information_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('professional_information/edit.html.twig', [
            'professional_information' => $professionalInformation,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="professional_information_delete", methods={"POST"})
     */
    public function delete(Request $request, ProfessionalInformation $professionalInformation): Response
    {
        if ($this->isCsrfTokenValid('delete'.$professionalInformation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($professionalInformation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('professional_information_index', [], Response::HTTP_SEE_OTHER);
    }
}
