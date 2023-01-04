<?php
    namespace App\Services;

use GradeRepository;

class GradeService
{
    protected $gradeRepository;
    
    public function __construct(GradeRepository $gradeRepository)
    {
        $this->gradeRepository = $gradeRepository;
    }
    
    public function getHighestGrade(){
        return $this->gradeRepository->findHighestGrade();
    }
}