<?php

namespace App\Service;

use App\Repository\ProfessionRepository;

class ProfessionsService{
    private $professionRepository;

    public function __construct(ProfessionRepository $professionRepository)
    {
        $this->professionRepository = $professionRepository;
    }
    
    public function getProfessions()
    {
        $names = $this->professionRepository->getNames();
        return $names;
    }
}