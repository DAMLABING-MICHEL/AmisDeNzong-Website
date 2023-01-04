<?php
    namespace App\Services;

use App\Models\Testimonial;
use App\Repositories\IndexRepository;
use App\Repositories\RubricRepository;
use App\Repositories\TestimonialRepository;

class TestimonialService
{
    protected $testimonialRepository;
    
    public function __construct(TestimonialRepository $testimonialRepository)
    {
        $this->testimonialRepository = $testimonialRepository;
    }
    public function getTestimonials(){
       return $this->testimonialRepository->findTestimonials();
    }
    
}