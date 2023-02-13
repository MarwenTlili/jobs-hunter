<?php

namespace App\Controller;

use App\Entity\SocialLink;
use App\Form\SocialLinkType;
use App\Repository\SocialLinkRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/social-link")
 */
class SocialLinkController extends AbstractController
{
    /**
     * @Route("/", name="social_link_index", methods={"GET"})
     */
    public function index(SocialLinkRepository $socialLinkRepository): Response
    {
        $seeker = $this->getUser()->getSeeker();
        
        if (!$seeker->getCv()->getSocialLink()) {
            return $this->redirectToRoute('social_link_new', [], Response::HTTP_SEE_OTHER);
        }else{
            return $this->redirectToRoute('social_link_edit', [
                'id' => $seeker->getCv()->getSocialLink()->getId()
            ]);
        }
    }

    /**
     * @Route("/new", name="social_link_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $socialLink = new SocialLink();
        $form = $this->createForm(SocialLinkType::class, $socialLink);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($socialLink);

            $cv = $this->getUser()->getSeeker()->getCv();
            $cv->setSocialLink($socialLink);
            $entityManager->persist($cv);

            $entityManager->flush();

            return $this->redirectToRoute('social_link_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('social_link/new.html.twig', [
            'social_link' => $socialLink,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="social_link_show", methods={"GET"})
     */
    public function show(SocialLink $socialLink): Response
    {
        return $this->render('social_link/show.html.twig', [
            'social_link' => $socialLink,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="social_link_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, SocialLink $socialLink): Response
    {
        $form = $this->createForm(SocialLinkType::class, $socialLink);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('social_link_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('social_link/edit.html.twig', [
            'social_link' => $socialLink,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="social_link_delete", methods={"POST"})
     */
    public function delete(Request $request, SocialLink $socialLink): Response
    {
        if ($this->isCsrfTokenValid('delete'.$socialLink->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($socialLink);
            $entityManager->flush();
        }

        return $this->redirectToRoute('social_link_index', [], Response::HTTP_SEE_OTHER);
    }
}
