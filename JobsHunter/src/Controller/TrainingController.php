<?php

namespace App\Controller;

use App\Entity\Training;
use App\Form\SearchTrainingsType;
use App\Form\TrainingType;
use App\Repository\TrainingRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/training")
 */
class TrainingController extends AbstractController
{
    /**
     * @Route("/", name="training_index", methods={"GET", "POST"})
     */
    public function index(Request $request, TrainingRepository $trainingRepository, PaginatorInterface $paginator): Response
    {
        $form = $this->createForm(SearchTrainingsType::class, [
            'action' => $this->generateUrl('training_index'),
        ]);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();
            $items = $trainingRepository->searchAllDESC($data);
        }else{
            $items = $trainingRepository->findAllDESC();
        }

        $trainings = $paginator->paginate(
            $items, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            TrainingRepository::PAGINATOR_PER_PAGE /*limit per page*/
        );

        return $this->render('training/index.html.twig', [
            'trainings' => $trainings,
            'trainingsCount' => count($items),
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/new", name="training_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $training = new Training();
        $form = $this->createForm(TrainingType::class, $training);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($training);
            $entityManager->flush();

            return $this->redirectToRoute('training_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('training/new.html.twig', [
            'training' => $training,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", name="training_show", methods={"GET"})
     */
    public function show(Training $training): Response
    {
        return $this->render('training/show.html.twig', [
            'training' => $training,
        ]);
    }

    /**
     * @Route("/{slug}/edit", name="training_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Training $training): Response
    {
        $form = $this->createForm(TrainingType::class, $training);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('training_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('training/edit.html.twig', [
            'training' => $training,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", name="training_delete", methods={"POST"})
     */
    public function delete(Request $request, Training $training): Response
    {
        if ($this->isCsrfTokenValid('delete'.$training->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($training);
            $entityManager->flush();
        }

        return $this->redirectToRoute('training_index', [], Response::HTTP_SEE_OTHER);
    }

    /**
     * @Route("/recent-trainings/{max}", name="trainings_recent")
     */
    public function recentTrainings(TrainingRepository $trainingRepository, int $max): Response
    {
        return $this->render('training/_recent_trainings.html.twig', [
            'trainings' => $trainingRepository->getLastTrainings($max)
        ]);
    }
}
