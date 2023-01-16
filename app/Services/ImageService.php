<?php
    namespace App\Services;

use App\Repositories\ImageRepository;
use App\Repositories\RubricRepository;

class ImageService
{
    protected $imageRepository;
    protected $rubricRepository;
    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
        $this->rubricRepository = new RubricRepository();
    }
    public function getImages($limit){
        $rubrics = $this->rubricRepository->findRubrics();
        $images = null;
        foreach ($rubrics as $key => $rubric) {
            $images = $this->imageRepository->findImagesByRubricId($rubric->id,$limit);
        }
        return $images;
    }
}