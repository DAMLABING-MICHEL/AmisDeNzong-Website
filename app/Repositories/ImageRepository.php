<?php
namespace App\Repositories;

use App\Models\Rubric;

class ImageRepository
{
    public function findImagesByRubricId($id,$limit){
        if($limit != null)
            $images = Rubric::find($id)->images()->limit($limit)->get();
        else
        $images = Rubric::find($id)->images()->get();
        return $images;
    }
}
