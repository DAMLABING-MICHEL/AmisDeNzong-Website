<?php
 namespace App\Repositories;

use App\Models\Feature;

class FeatureRepository
{
    public function addData($request)
    {
        $request->merge([
            'title' => ['en' =>$request->title_en,'fr' =>$request->title_fr,'it' =>$request->title_it]
        ]);   
    }
    
    public function getAll(){
        return Feature::all();
    }
    
    public function getFeature($title){
        $features = $this->getAll();
        $feature = null;
        foreach ($features as $key => $f) {
            if($f->title == $title){
                $feature = $f;
            }
        }
        return $feature;
    }
    
}