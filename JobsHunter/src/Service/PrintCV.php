<?php

namespace App\Service;

use Knp\Snappy\Pdf;
use Symfony\Component\Security\Core\Security;
use Twig\Environment;

class PrintCV {
    private $security;
    private $pdf;
    private $twig;
    private $documentsDirectory;

    public function __construct(Security $security, $documentsDirectory, Pdf $pdf, Environment $twig) {
        $this->security = $security;
        $this->pdf = $pdf;
        $this->twig = $twig;
        $this->documentsDirectory = $documentsDirectory;

        /**
         * set documentsDirectory
         */
        /** @var \App\Entity\User $user */
        $user = $this->security->getUser();
        if ($user) {
            define(
                'OUTPUT_FILE',
                $this->documentsDirectory . '/cv/' . $user->getSeeker()->getFirstName() . '_' . $user->getSeeker()->getLastName() . '.pdf'
            );
        } else {
            define('OUTPUT_FILE', $this->documentsDirectory . '/cv/pdf_template.pdf');
        }
    }

    public function toPDF($cv) {
        $html = $this->twig->render('cv/pdf_template.html.twig', [
            'cv' => $cv,
            'inline_styles' => true
        ]);

        return $this->pdf->getOutputFromHtml($html);
    }
}
