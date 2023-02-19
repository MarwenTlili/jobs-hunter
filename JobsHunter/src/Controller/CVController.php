<?php

namespace App\Controller;

use App\Entity\CV;
use App\Form\CVType;
use App\Repository\CVRepository;
use App\Service\FileUploader;
use App\Service\PrintCV;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;

/**
 * @Route("/cv")
 */
class CVController extends AbstractController{
    private $security;
    private $printCV;

    public function __construct(Security $security, PrintCV $printCV){
        $this->security = $security;
        $this->printCV = $printCV;
    }
    
    /**
     * @Route("/", name="cv_index", methods={"GET", "POST"})
     */
    public function index(CVRepository $cVRepository): Response
    {
        $this->denyAccessUnlessGranted('ROLE_SEEKER');

        /** @var \App\Entity\User $user */
        $user = $this->security->getUser();
        $seeker = $user->getSeeker();

        if (!$this->getUser()->getSeeker()->getCv()) {
            $cv = new CV();
            $seeker->setCv($cv);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cv);
            $entityManager->persist($seeker);
            $entityManager->flush();
        }else{
            return $this->redirectToRoute('cv_edit', [
                'id' => $seeker->getCv()->getId()
            ], Response::HTTP_SEE_OTHER);
        }
        
        return $this->render('cv/index.html.twig', [
            'cvs' => $cVRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="cv_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $cV = new CV();
        $form = $this->createForm(CVType::class, $cV);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cV);
            $entityManager->flush();

            return $this->redirectToRoute('cv_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cv/new.html.twig', [
            'cv' => $cV,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cv_show", methods={"GET"})
     */
    public function show(CV $cV): Response
    {
        return $this->render('cv/show.html.twig', [
            'cv' => $cV,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cv_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CV $cV): Response
    {
        $form = $this->createForm(CVType::class, $cV);
        $form->handleRequest($request);

        dump($cV);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cv_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('cv/edit.html.twig', [
            'cv' => $cV,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cv_delete", methods={"POST"})
     */
    public function delete(Request $request, CV $cV): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cV->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cV);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cv_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/{user}/preview", name="cv_preview", methods={"GET"})
     */
    public function preview(): Response{
        $this->denyAccessUnlessGranted('ROLE_SEEKER');

        /** @var \App\Entity\User $user */
        $user = $this->security->getUser();
        $seeker = $user->getSeeker();
        $cv = $seeker->getCv();

        return $this->render('cv/preview.html.twig', [
            'cv' => $cv
        ]);
    }

    /**
     * @Route("/{user}/_preview", name="cv_preview_template", methods={"GET"})
     */
    public function previewTemplate(){
        $this->denyAccessUnlessGranted('ROLE_SEEKER');

        /** @var \App\Entity\User $user */
        $user = $this->security->getUser();
        $seeker = $user->getSeeker();
        $cv = $seeker->getCv();

        return $this->render('cv/_preview.html.twig', [
            'cv' => $cv
        ]);
    }

    /**
     * @Route("/print/pdf", name="cv_print")
     */
    public function printAction(FileUploader $fileUploader){
        /** @var \App\Entity\User $user */
        $user = $this->security->getUser();
        $seeker = $user->getSeeker();
        $cv = $seeker->getCv();
        
        $html = $this->renderView('cv/_preview.html.twig', [
            'title' => "pdf preview",
            'cv' => $cv
        ]);

        file_put_contents(constant('OUTPUT_FILE'), $this->printCV->toPDF_tcpdf($html));

        if ($fileUploader->isFileExists(constant("OUTPUT_FILE"))) {
            return $this->file(constant("OUTPUT_FILE"), "cv_preview.pdf", ResponseHeaderBag::DISPOSITION_INLINE);
        }
        return $this->json(['error' => "CV preview file doesn't exist !"]);
    }
}
