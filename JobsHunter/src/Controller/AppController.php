<?php

namespace App\Controller;

use App\Repository\JobRepository;
use App\Repository\TrainingRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     */
    public function index(JobRepository $jobRepository, TrainingRepository $trainingRepository): Response
    {
        return $this->render('app/index.html.twig', [
            'jobs' => $jobRepository->getLastJobs(),
            'trainings' => $trainingRepository->getLastTrainings()
        ]);
    }
}
