<?php
 namespace App\Repositories;
 
use App\Models\Grade;

class GradeRepository
{
    public function findHighestGrade(){
        $highestGrade = Grade::where('hight_grade', true)->get()->first();
        return $highestGrade;
    }
    
    public function addData($request){
        $request->merge([
            'hight_grade' => $request->has('hight_grade')
        ]);
    }
}