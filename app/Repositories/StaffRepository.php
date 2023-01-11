<?php
namespace App\Repositories;

use App\Models\Grade;

class StaffRepository
{
    protected $gradeRepository;
    
    public function findCertifiedTeachers(){
        $this->gradeRepository = new GradeRepository();
        $grade = $this->gradeRepository->findHighestGrade();
        $certifiedTeachers = null;
        if($grade != null){
            $certifiedTeachers = Grade::findOrFail($grade->id)->staffs()->get();
        }
        return $certifiedTeachers;
    }
    
}