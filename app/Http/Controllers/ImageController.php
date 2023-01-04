<?php

namespace App\Http\Controllers;

use App\Models\Rubric;
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
        $kinderImages = $this->imageService->getKinderImages(null);
        $elementaryImages = $this->imageService->getElementaryImages(null);
        $leisureImages = $this->imageService->getLeisureImages(null);
        return view('front.gallery',compact(['rubrics','kinderImages','elementaryImages','leisureImages']));
    }
}
