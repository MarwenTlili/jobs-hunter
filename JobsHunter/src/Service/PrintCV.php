<?php

namespace App\Service;

use Symfony\Component\Security\Core\Security;
use TCPDF;

class PrintCV{
    private $security;
    private $documentsDirectory;
    
    public function __construct($documentsDirectory, Security $security){
        $this->documentsDirectory = $documentsDirectory;
        $this->security = $security;
        /** @var \App\Entity\User $user */
        $user = $this->security->getUser();
        if ($user) {
            define(
                'OUTPUT_FILE', 
                $this->documentsDirectory.'/cv/'.$user->getSeeker()->getFirstName().'_'.$user->getSeeker()->getLastName().'.pdf'
            );
        }else{
            define('OUTPUT_FILE', $this->documentsDirectory.'/cv/cv_preview.pdf');
        }
    }

    public function toPDF_tcpdf($html){
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator('Vlad');
        $pdf->SetAuthor('Marwen Tlili');
        $pdf->SetTitle('Example 001');
        $pdf->SetSubject('cv preview');
        $pdf->SetKeywords('PDF, example, test, guide');

        // set default header data
        // $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 061', PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, 20, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set font
        $pdf->SetFont('helvetica', '', 12);

        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage();

        $pdf->setCellHeightRatio(1);
        
        // set cell padding
        $pdf->setCellPaddings(null, null, null, null);

        // set cell margins
        $pdf->setCellMargins(null, null, null, null);

        // reset pointer to the last page
        $pdf->lastPage();

        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        
        return $pdf->Output(constant("OUTPUT_FILE"), 'I');
    }
}