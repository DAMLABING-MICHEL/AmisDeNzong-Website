<?php

namespace App\Http\Controllers;

use App\Services\ImageService;
use App\Services\RubricService;

class ImageController extends Controller
{
    protected $imageService;
    protected $rubricService;
    
    public function __construct(ImageService $imageService,RubricService $rubricService)
    {
        $this->imageService = $imageService;
        $this->rubricService = $rubricService;
    }
    public function getImages()
    {
        $rubrics = $this->rubricService->getRubrics();
        $images = $this->imageService->getImages(null);
        return view('front.gallery',compact(['rubrics','images']));
    }
}
