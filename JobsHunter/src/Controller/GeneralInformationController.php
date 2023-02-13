<?php

namespace App\Controller;

use App\Entity\GeneralInformation;
use App\Form\GeneralInformationType;
use App\Service\FileUploader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @Route("/general-information")
 */
class GeneralInformationController extends AbstractController{
    /**
     * @Route("/", name="general_information_index", methods={"GET"})
     */
    public function index(): Response{
        $seeker = $this->getUser()->getSeeker();
       
        if (!$this->getUser()->getSeeker()->getCv()->getGeneralInformation()) {
            return $this->redirectToRoute('general_information_new', [], Response::HTTP_MOVED_PERMANENTLY);
        }else{
            return $this->redirectToRoute('general_information_edit', [
                'id' => $seeker->getCv()->getGeneralInformation()->getId()
            ]);
        }
    }

    /**
     * @Route("/new", name="general_information_new", methods={"GET","POST"})
     */
    public function new(Request $request, FileUploader $fileUploader): Response{
        $errors = [];
        $safeFileName = null;

        $generalInformation = new GeneralInformation();

        $form = $this->createForm(GeneralInformationType::class, $generalInformation);
        $form->handleRequest($request);
        
        if ($form->isSubmitted()) {
            /** @var UploadedFile $brochureFile */
            $brochureFile = $form->get('photo')->getData();
            
            if ($brochureFile) {    // if fomr['photo'] has value
                $safeFileName = $fileUploader->upload($brochureFile);
                if ($safeFileName) {
                    $generalInformation->setPhoto($safeFileName);
                }else{
                    array_push($errors, "Could not upload file!");
                }
            }
            
            // persist form data only if there is no errors (like upload file error, ...)
            if (empty($errors)) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($generalInformation);
                $cv = $this->getUser()->getSeeker()->getCv();
                $cv->setGeneralInformation($generalInformation);
                $entityManager->persist($cv);
                $entityManager->flush();
                return $this->redirectToRoute('general_information_edit',[
                    'id' => $generalInformation->getId(),
                ],Response::HTTP_MOVED_PERMANENTLY);
            }

        }

        return $this->render('general_information/new.html.twig', [
            'general_information' => $generalInformation,
            'form' => $form->createView(),
            'errors' => $errors,
        ]);
    }

    /**
     * @Route("/{id}", name="general_information_show", methods={"GET"})
     */
    public function show(GeneralInformation $generalInformation): Response{
        return $this->render('general_information/show.html.twig', [
            'general_information' => $generalInformation,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="general_information_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, GeneralInformation $generalInformation, FileUploader $fileUploader): Response{   
        $errors = [];

        $form = $this->createForm(GeneralInformationType::class, $generalInformation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // if old photo exists remove it before upload a new one
            if ($generalInformation->getPhoto()) {
                $fileAbsolutePath = $fileUploader->getBrochuresDirectory()."/".$generalInformation->getPhoto();
                $isFileDeleted = $fileUploader->remove($fileAbsolutePath);
                if (!$isFileDeleted) {
                    array_push($errors, "Could not delete photo!");
                    return $this->render('general_information/edit.html.twig', [
                        'general_information' => $generalInformation,
                        'errors' => $errors,
                        'form' => $form->createView(),
                    ]);
                }
            }
            
            /** @var UploadedFile $brochureFile */
            $brochureFile = $form->get('photo')->getData();
            if ($brochureFile) {
                $safeFileName = $fileUploader->upload($brochureFile);
                if ($safeFileName) {
                    $generalInformation->setPhoto($safeFileName);
                }else{
                    array_push($errors, "Could not upload photo!");
                }
            }

            if (empty($errors)) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($generalInformation);

                $cv = $this->getUser()->getSeeker()->getCv();
                $cv->setGeneralInformation($generalInformation);
                $entityManager->persist($cv);

                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('general_information_edit',[
                    'id' => $generalInformation->getId(),
                ],Response::HTTP_MOVED_PERMANENTLY);
            }
        }

        return $this->render('general_information/edit.html.twig', [
            'general_information' => $generalInformation,
            'errors' => $errors,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="general_information_delete", methods={"POST"})
     */
    public function delete(Request $request, GeneralInformation $generalInformation): Response{
        if ($this->isCsrfTokenValid('delete'.$generalInformation->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($generalInformation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('general_information_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/{id}/photo/delete", name="general_information_photo_delete", methods={"POST"})
     */
    public function deletePhoto(GeneralInformation $generalInformation, FileUploader $fileUploader): JsonResponse{
        // throw $this->createNotFoundException("manually throwed NotFound Exception. 404");
        // throw $this->createAccessDeniedException("manually throwed AccessDenied Exception. 403");

        $isDeleted = false;
        $photoName = $generalInformation->getPhoto();

        if ($photoName) {
            $fileAbsolutepath = $fileUploader->getBrochuresDirectory()."/".$photoName;
            // try to remove photo from filesystem
            $isFileDeleted = $fileUploader->remove($fileAbsolutepath);
            if ($isFileDeleted) {                
                // remove photo from database
                $generalInformation->setPhoto(null);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($generalInformation);
                $this->getDoctrine()->getManager()->flush();
                $isDeleted = true;
            }
        }

        return $this->json([
            'photoName' => $photoName,
            'isDeleted' => $isDeleted
        ]);
    }
}
