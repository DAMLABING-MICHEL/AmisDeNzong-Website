<?php
namespace App\Repositories;

use App\Models\Grade;

class StaffRepository
{
    protected $gradeRepository;
    
    public function findCertifiedTeachers(){
        $this->gradeRepository = new GradeRepository();
        $certifiedTeachers = Grade::findOrFail($this->gradeRepository->findHighestGrade()->id)->staffs()->get();
        return $certifiedTeachers;
    }
    
}