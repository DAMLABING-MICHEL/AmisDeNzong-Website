<?php

namespace App\Repositories;

use App\Models\Slide;

class SlideRepository
{
    public $imageRepository;
    
    public function __construct()
    {
        $this->imageRepository = new ImageRepository();
    }
    
    public function findAll(){
        return Slide::all();
    }

    public function addData($request){
        $request->merge([
            'description' => ['en'=>$request->description_en,'fr'=>$request->description_fr,'it'=>$request->description_it,]
        ]);
    }

    public function saveImage($slide,$request){
        $this->imageRepository->store($request,null,null,null,null,null,null,$slide);
    }
    
    
}