<?php
    namespace App\Services;

use App\Repositories\ImageRepository;
use App\Repositories\RubricRepository;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Session;

class ImageService
{
    protected $imageRepository;
    protected $rubricRepository;
    public function __construct(ImageRepository $imageRepository)
    {
        $this->imageRepository = $imageRepository;
        $this->rubricRepository = new RubricRepository();
    }
    public function getKinderImages($limit){
        $kinderRubric = $this->rubricRepository->findRubricBytitle('Kindergarten');
            if ($kinderRubric != null) {
                $kinderImages = $this->imageRepository->findImagesByRubricId($kinderRubric->id,$limit);
            }
        return $kinderImages;
    }
    
    public function getElementaryImages($limit){
        $elementaryRubric = $this->rubricRepository->findRubricBytitle('Primary');
            if ($elementaryRubric != null) {
                $elementaryImages = $this->imageRepository->findImagesByRubricId($elementaryRubric->id,$limit);
                return $elementaryImages;
            }
    }
    
    public function getLeisureImages($limit){
        $leisureRubric = $this->rubricRepository->findRubricBytitle('Leisure');
        if ($leisureRubric != null) {
            $leisureImages = $this->imageRepository->findImagesByRubricId($leisureRubric->id,$limit);
            return $leisureImages;
        }
    }
}