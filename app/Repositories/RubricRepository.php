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
    
    public function addData($request){
            $request->validate([
                'title_en' => 'required|max:255',
                'title_fr' => 'required|max:255',
                'title_it' => 'required|max:255',
            ]);
            $request->merge([
                'title' => ['en'=>$request->title_en,'fr'=>$request->title_fr,'it'=>$request->title_it,]
            ]);
    }
}
