<?php
namespace App\Repositories;

use App\Models\Rubric;

class RubricRepository
{
    
    public function findRubrics(){
        $rubrics = Rubric::all();
        return $rubrics;
    }
    
    public function findRubricBytitle($title){
        $rubric = Rubric::where('title',$title)->get()->first();
        return $rubric;
    }
}
