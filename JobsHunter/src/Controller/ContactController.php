<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ContactType;

class ContactController extends AbstractController {
    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request): Response {
        $user = $this->getUser();

        $form = $this->createForm(ContactType::class, null, [
            'csrf_protection' => true,
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /** @var \App\Entity\Contact $contact */
            $contact = $form->getData();

            // Use loged in user name and email to submit contact form
            if ($user) {
                $contact->setFullName($user->getUsername());
                $contact->setEmail($user->getEmail());
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);
            $em->flush();

            $this->addFlash('success', 'Votre message a été envoyé avec succès !');
            return $this->redirectToRoute('contact');
        }

        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
            'contactForm' => $form->createView(),
        ]);
    }
}
