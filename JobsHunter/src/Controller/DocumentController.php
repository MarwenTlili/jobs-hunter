<?php

namespace App\Controller;

use App\Entity\Document;
use App\Form\DocumentType;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/document")
 */
class DocumentController extends AbstractController
{
    /**
     * @Route("/", name="document_index", methods={"GET"})
     */
    public function index(): Response{
        $seeker = $this->getUser()->getSeeker();

        if (!$seeker->getCv()->getDocument()) {
            return $this->redirectToRoute('document_new', [], Response::HTTP_MOVED_PERMANENTLY);
        }else{
            return $this->redirectToRoute('document_edit', [
                'id' => $seeker->getCv()->getDocument()->getId()
            ]);
        }
        
        return $this->redirectToRoute('app_homepage', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/new", name="document_new", methods={"GET","POST"})
     */
    public function new(Request $request, FileUploader $fileUploader): Response{
        $errors = [];
        $safeFileName = null;
        $document = new Document();

        $form = $this->createForm(DocumentType::class, $document);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $diplomaFile */
            $diplomaFile = $form->get('diplomaFileName')->getData();
            if ($diplomaFile) {
                $safeFileName = $fileUploader->upload($diplomaFile);
                if ($safeFileName) {
                    $document->setDiploma($safeFileName);
                }else{
                    array_push($errors, "Could not upload diploma file.");
                }
            }

            /** @var UploadedFile $realisationFile */
            $realisationFile = $form->get('realisationFileName')->getData();
            if ($realisationFile) {
                $safeFileName = $fileUploader->upload($realisationFile);
                if ($safeFileName) {
                    $document->setRealisation($safeFileName);
                }else{
                    array_push($errors, "Could not upload realisation file.");
                }
            }

            // only persist document if there is no upload errors
            if (empty($errors)) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($document);
                
                $cv = $this->getUser()->getSeeker()->getCv();
                $cv->setDocument($document);
                $entityManager->persist($cv);

                $entityManager->flush();

                return $this->redirectToRoute('document_edit', [
                    'id' => $document->getId()
                ], Response::HTTP_MOVED_PERMANENTLY);
            }

        }

        return $this->render('document/new.html.twig', [
            'document' => $document,
            'form' => $form->createView(),
            'errors' => $errors
        ]);
    }

    /**
     * @Route("/{id}", name="document_show", methods={"GET"})
     */
    public function show(Document $document): Response{
        return $this->render('document/show.html.twig', [
            'document' => $document,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="document_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Document $document, FileUploader $fileUploader): Response{
        $errors = [];

        $form = $this->createForm(DocumentType::class, $document);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // if old documents exists remove them before upload a new one
            if ($document->getDiploma() && $form->get('diplomaFileName')->getData()) {
                if (!$fileUploader->remove($fileUploader->getDocumentsDirectory()."/".$document->getDiploma())) {
                    array_push($errors, "Could not remove old diploma document.");
                    return $this->render('document/edit.html.twig', [
                        'document' => $document,
                        'form' => $form->createView(),
                        'errors' => $errors
                    ]);
                }
            }
            if ($document->getRealisation() && $form->get('realisationFileName')->getData()) {
                if (!$fileUploader->remove($fileUploader->getDocumentsDirectory()."/".$document->getRealisation())) {
                    array_push($errors, "Could not remove old realisation document.");
                    return $this->render('document/edit.html.twig', [
                        'document' => $document,
                        'form' => $form->createView(),
                        'errors' => $errors
                    ]);
                }
            }
            
            /** @var UploadedFile $diplomaFile */
            if ($form->get('diplomaFileName')->getData()) {
                $safeFileName = $fileUploader->upload($form->get('diplomaFileName')->getData());
                if ($safeFileName) {
                    $document->setDiploma($safeFileName);
                }else{
                    array_push($errors, "Could not upload new diploma document.");
                }
            }

            /** @var UploadedFile $realisationFile */
            if ($form->get('realisationFileName')->getData()) {
                $safeFileName = $fileUploader->upload($form->get('realisationFileName')->getData());
                if ($safeFileName) {
                    $document->setRealisation($safeFileName);
                }else{
                    array_push($errors, "Could not upload new realisation document.");
                }
            }

            if (empty($errors)) {
                $entityManager = $this->getDoctrine()->getManager();
                // (eventually) save entity 
                $entityManager->persist($document);

                // // actually executes the queries
                $this->getDoctrine()->getManager()->flush();

                // redirect to same controller to prevent [refresh, F5] behaviour
                return $this->redirectToRoute('document_edit', [
                    'id' => $document->getId()
                ], Response::HTTP_MOVED_PERMANENTLY);
            }
            
        }

        return $this->render('document/edit.html.twig', [
            'document' => $document,
            'form' => $form->createView(),
            'errors' => $errors
        ]);
    }

    /**
     * @Route("/{id}", name="document_delete", methods={"POST"})
     */
    public function delete(Request $request, Document $document): Response{
        if ($this->isCsrfTokenValid('delete'.$document->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($document);
            $entityManager->flush();
        }

        return $this->redirectToRoute('document_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/{id}/{documentType}/{documentName}/delete", name="document_type_delete", methods={"POST"})
     */
    public function deleteDocument(Document $document, string $documentType, string $documentName, FileUploader $fileUploader): JsonResponse{
        // throw $this->createNotFoundException("manually throwed NotFound Exception. 404");
        // throw $this->createAccessDeniedException("manually throwed AccessDenied Exception. 403");

        $isDeleted = false;
        if (!$documentType || !$documentName) {
            return $this->json([
                "documentName" => $documentName,
                "isDeleted" => $isDeleted
            ]);
        }
        
        if ($fileUploader->remove($fileUploader->getDocumentsDirectory()."/".$documentName)) {
            switch ($documentType) {
                case 'diploma':
                    $document->setDiploma(null); break;
                case 'realisation':
                    $document->setRealisation(null); break;
                default: 
                    # code... 
                break;
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($document);
            $entityManager->flush();

            $isDeleted = true;
        }

        return $this->json([
            "documentName" => $documentName,
            "documentType" => $documentType,
            "isDeleted" => $isDeleted
        ]);
    }
}
