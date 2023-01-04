<?php
    namespace App\Services;

use App\Repositories\RubricRepository;

class RubricService
{
    protected $rubricRepository;
    
    public function __construct(RubricRepository $rubricRepository)
    {
        $this->rubricRepository = $rubricRepository;
    }
    
    public function getRubrics(){
        return $this->rubricRepository->findRubrics();
    }
}